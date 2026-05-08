<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display the home/blog listing page.
     */
    public function index(Request $request)
    {
        $categories = Category::withCount(['blogs' => function ($q) {
            $q->where('status', 'published');
        }])->get();

        // If AJAX request, return filtered results
        if ($request->ajax()) {
            return $this->filterBlogs($request);
        }

        $blogs = Blog::with('category')
            ->published()
            ->orderBy('publish_date', 'desc')
            ->paginate(6);

        return view('frontend.index', compact('blogs', 'categories'));
    }

    /**
     * Filter blogs via AJAX.
     */
    private function filterBlogs(Request $request)
    {
        $query = Blog::with('category')->published();

        // Search filter
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('short_description', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%");
            });
        }

        // Category filter
        if ($request->filled('category') && $request->category !== 'all') {
            $query->where('category_id', $request->category);
        }

        // Date filter
        if ($request->filled('date_from')) {
            $query->where('publish_date', '>=', $request->date_from);
        }
        if ($request->filled('date_to')) {
            $query->where('publish_date', '<=', $request->date_to);
        }

        // Sorting
        $sort = $request->get('sort', 'latest');
        if ($sort === 'oldest') {
            $query->orderBy('publish_date', 'asc');
        } else {
            $query->orderBy('publish_date', 'desc');
        }

        $blogs = $query->paginate(6);

        return response()->json([
            'html' => view('frontend.partials.blog-cards', compact('blogs'))->render(),
            'pagination' => view('frontend.partials.pagination', compact('blogs'))->render(),
            'total' => $blogs->total(),
        ]);
    }

    /**
     * Display the blog detail page.
     */
    public function show($slug)
    {
        $blog = Blog::with('category')->where('slug', $slug)->where('status', 'published')->firstOrFail();

        // Related posts
        $relatedPosts = Blog::with('category')
            ->published()
            ->where('category_id', $blog->category_id)
            ->where('id', '!=', $blog->id)
            ->latest('publish_date')
            ->take(3)
            ->get();

        // Previous and Next posts
        $previousPost = Blog::published()
            ->where('publish_date', '<', $blog->publish_date)
            ->orderBy('publish_date', 'desc')
            ->first();

        $nextPost = Blog::published()
            ->where('publish_date', '>', $blog->publish_date)
            ->orderBy('publish_date', 'asc')
            ->first();

        $categories = Category::withCount(['blogs' => function ($q) {
            $q->where('status', 'published');
        }])->get();

        return view('frontend.show', compact('blog', 'relatedPosts', 'previousPost', 'nextPost', 'categories'));
    }

    /**
     * Search suggestions via AJAX.
     */
    public function searchSuggestions(Request $request)
    {
        $search = $request->get('q', '');

        if (strlen($search) < 2) {
            return response()->json([]);
        }

        $blogs = Blog::published()
            ->where('title', 'like', "%{$search}%")
            ->select('title', 'slug')
            ->take(5)
            ->get();

        return response()->json($blogs);
    }
}
