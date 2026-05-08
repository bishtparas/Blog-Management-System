# JobYaari Blog - Blog Management System

A complete full-stack responsive Blog Management System built with **Laravel 11**, inspired by modern news/blog portals. Features a clean, professional UI with AJAX-powered filtering, admin dashboard with CRUD operations, and mobile-responsive design.

![Laravel](https://img.shields.io/badge/Laravel-11-red)
![PHP](https://img.shields.io/badge/PHP-8.4-blue)
![Bootstrap](https://img.shields.io/badge/Bootstrap-5.3-purple)
![jQuery](https://img.shields.io/badge/jQuery-3.7-blue)

---

## 🚀 Tech Stack

| Technology | Purpose |
|---|---|
| Laravel 11 | PHP Framework (Backend) |
| PHP 8.4+ | Server-side Language |
| MySQL / SQLite | Database |
| Blade Templates | Templating Engine |
| Bootstrap 5.3 | CSS Framework |
| jQuery 3.7 + AJAX | Dynamic Filtering |
| Bootstrap Icons | Icon Library |
| Inter (Google Font) | Typography |

---

## ✨ Features

### Frontend
- **Blog Listing Page** with card-based layout
- **AJAX Search** - Live search without page reload
- **AJAX Category Filtering** - Instant category-based filtering
- **AJAX Date Filtering** - Filter blogs by date range
- **AJAX Sorting** - Sort by latest/oldest
- **AJAX Pagination** - Navigate pages without reload
- **Blog Detail Page** - Full article view with related posts
- **Share Buttons** - Facebook, Twitter, LinkedIn, WhatsApp
- **Previous/Next Navigation** between blog posts
- **Search Suggestions** - Live dropdown suggestions
- **Dark Mode Toggle** - Light/dark theme with persistence
- **Responsive Design** - Mobile, tablet, laptop, desktop
- **Skeleton Loading** - Loading spinner during AJAX
- **Scroll-to-Top Button**
- **Hero Section** with animated gradient
- **Comments Section** (frontend UI)

### Admin Panel
- **Secure Login** with session authentication
- **Dashboard Overview** - Stats, recent posts, quick actions
- **Blog CRUD** - Create, Read, Update, Delete blog posts
- **Category Management** - Add, edit, delete categories
- **Image Upload** with preview before upload
- **Rich Text Editor** (TinyMCE integration)
- **Form Validation** with error messages
- **Toast Notifications** for success/error feedback
- **Responsive Sidebar** navigation

### Technical
- RESTful Routes
- MVC Architecture
- Eloquent ORM with relationships
- SEO-friendly slugs and URLs
- CSRF protection
- File upload handling
- Database migrations and seeders

---

## 📁 Project Structure

```
├── app/
│   ├── Http/Controllers/
│   │   ├── BlogController.php          # Frontend blog listing & detail
│   │   ├── Auth/LoginController.php    # Authentication
│   │   └── Admin/
│   │       ├── AdminBlogController.php     # Blog CRUD + Dashboard
│   │       └── AdminCategoryController.php # Category CRUD
│   └── Models/
│       ├── Blog.php        # Blog model with relationships
│       └── Category.php    # Category model
├── database/
│   ├── migrations/         # Database schema
│   └── seeders/            # Sample data
├── public/
│   ├── css/
│   │   ├── style.css       # Frontend styles
│   │   └── admin.css       # Admin panel styles
│   ├── js/
│   │   ├── app.js          # Main JS (dark mode, scroll, etc.)
│   │   └── blog-filter.js  # AJAX filtering system
│   └── uploads/blogs/      # Blog images
├── resources/views/
│   ├── layouts/
│   │   ├── app.blade.php   # Frontend layout
│   │   └── admin.blade.php # Admin layout
│   ├── frontend/
│   │   ├── index.blade.php # Blog listing
│   │   ├── show.blade.php  # Blog detail
│   │   └── partials/       # Blog cards, pagination
│   ├── admin/
│   │   ├── dashboard.blade.php
│   │   ├── blogs/          # CRUD views
│   │   └── categories/     # Category management
│   └── auth/
│       └── login.blade.php # Admin login
└── routes/web.php          # All routes
```

---

## ⚡ Installation

### Prerequisites
- PHP 8.1+ with extensions: openssl, mbstring, pdo_mysql/pdo_sqlite, curl, fileinfo
- Composer
- MySQL 8.0+ (or SQLite)
- Node.js (optional, for Vite assets)

### Step 1: Clone the Repository
```bash
git clone <repository-url>
cd "Blog management system"
```

### Step 2: Install Dependencies
```bash
composer install
```

### Step 3: Configure Environment
```bash
cp .env.example .env
php artisan key:generate
```

### Step 4: Configure Database

**For MySQL:**
Edit `.env` file:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=blog_management
DB_USERNAME=root
DB_PASSWORD=your_password
```

Create the database:
```sql
CREATE DATABASE blog_management;
```

**For SQLite (Quick Start):**
```env
DB_CONNECTION=sqlite
```
The SQLite database file will be auto-created at `database/database.sqlite`.

### Step 5: Run Migrations & Seed Data
```bash
php artisan migrate --seed
```

### Step 6: Create Storage Link
```bash
php artisan storage:link
```

### Step 7: Start Development Server
```bash
php artisan serve
```

Visit: **http://127.0.0.1:8000**

---

## 🔐 Admin Login Credentials

| Field | Value |
|---|---|
| URL | http://127.0.0.1:8000/login |
| Email | admin@example.com |
| Password | admin123 |

---

## 📊 Database Schema

### users
| Column | Type |
|---|---|
| id | bigint (PK) |
| name | varchar |
| email | varchar (unique) |
| password | varchar |
| timestamps | created_at, updated_at |

### categories
| Column | Type |
|---|---|
| id | bigint (PK) |
| name | varchar |
| slug | varchar (unique) |
| timestamps | created_at, updated_at |

### blogs
| Column | Type |
|---|---|
| id | bigint (PK) |
| title | varchar |
| slug | varchar (unique) |
| short_description | text |
| content | longtext |
| image | varchar (nullable) |
| category_id | bigint (FK → categories) |
| publish_date | date |
| status | enum (published, draft) |
| timestamps | created_at, updated_at |

---

## 🌐 Deployment

### Render / 000webhost / InfinityFree

1. Upload all project files
2. Set document root to `/public`
3. Configure `.env` with production database credentials
4. Run `php artisan migrate --seed`
5. Set `APP_ENV=production` and `APP_DEBUG=false`
6. Run `php artisan config:cache && php artisan route:cache`

---

## 📦 Default Categories

- Admit Card
- Results
- Recruitment
- Government Jobs
- Education

---

## 📝 License

This project is built for the **JobYaari Developer Assessment**.

---

Built with ❤️ using Laravel 11
