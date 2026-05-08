<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Support\Str;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::all();

        $blogs = [
            [
                'title' => 'SSC CGL 2024 Admit Card Released – Download Now',
                'short_description' => 'Staff Selection Commission has released the admit card for SSC CGL 2024 Tier-I examination. Candidates can download from the official website.',
                'content' => '<h2>SSC CGL 2024 Admit Card</h2><p>The Staff Selection Commission (SSC) has officially released the admit card for the Combined Graduate Level (CGL) Examination 2024 Tier-I. This is a crucial step for all registered candidates who have been preparing for one of the most sought-after government examinations in India.</p><h3>How to Download SSC CGL 2024 Admit Card</h3><p>Follow these simple steps to download your admit card:</p><ol><li>Visit the official SSC website at ssc.nic.in</li><li>Click on the "Admit Card" section</li><li>Select "CGL 2024 Tier-I Admit Card"</li><li>Enter your Registration Number and Date of Birth</li><li>Click on "Download Admit Card"</li><li>Save and print the admit card for future reference</li></ol><h3>Important Details on Admit Card</h3><p>Your admit card will contain the following information:</p><ul><li>Candidate Name and Photo</li><li>Roll Number</li><li>Examination Date and Time</li><li>Examination Center Address</li><li>Important Instructions</li></ul><h3>Exam Pattern</h3><p>The SSC CGL Tier-I examination consists of four sections: General Intelligence and Reasoning, General Awareness, Quantitative Aptitude, and English Comprehension. Each section carries 50 marks, making it a total of 200 marks with a time duration of 60 minutes.</p><p>Candidates are advised to carry a valid photo ID along with the admit card to the examination center. Any discrepancy in the details should be reported immediately to the regional SSC office.</p>',
                'category' => 'Admit Card',
                'publish_date' => '2024-12-15',
            ],
            [
                'title' => 'UPSC CSE 2024 Prelims Result Declared',
                'short_description' => 'Union Public Service Commission has declared the results of Civil Services Preliminary Examination 2024. Check your result now.',
                'content' => '<h2>UPSC Civil Services Prelims Result 2024</h2><p>The Union Public Service Commission (UPSC) has officially announced the results for the Civil Services Examination (CSE) Preliminary 2024. Thousands of aspirants who appeared for the examination can now check their results on the official UPSC website.</p><h3>Key Highlights</h3><ul><li>Total candidates appeared: 10,00,000+</li><li>Candidates qualified for Mains: 14,624</li><li>Cut-off marks vary by category</li><li>Mains examination scheduled for September 2024</li></ul><h3>How to Check Results</h3><p>Candidates can follow these steps to check their results:</p><ol><li>Visit upsc.gov.in</li><li>Click on "Civil Services Prelims 2024 Result"</li><li>The PDF will open with roll numbers of qualified candidates</li><li>Use Ctrl+F to search for your roll number</li></ol><h3>Next Steps</h3><p>Qualified candidates should now focus on preparation for the Mains examination. The DAF (Detailed Application Form) will be available soon on the UPSC website. Candidates must fill in their preferences for optional subjects, services, and other important details.</p><p>The UPSC Mains examination is a comprehensive test that includes 9 papers over 5 days. Candidates are advised to start their preparation immediately and focus on answer writing practice.</p>',
                'category' => 'Results',
                'publish_date' => '2024-12-10',
            ],
            [
                'title' => 'Indian Railways Recruitment 2024 – 50,000 Vacancies',
                'short_description' => 'Railway Recruitment Board announces massive recruitment drive for 50,000 vacancies across multiple departments. Apply before the deadline.',
                'content' => '<h2>Indian Railways Mega Recruitment 2024</h2><p>The Railway Recruitment Board (RRB) has announced one of the largest recruitment drives in recent years with over 50,000 vacancies across multiple departments and zones. This presents a golden opportunity for job seekers across India.</p><h3>Vacancy Details</h3><ul><li>Group D: 25,000 posts</li><li>NTPC (Non-Technical Popular Categories): 15,000 posts</li><li>Technicians: 7,000 posts</li><li>JE (Junior Engineer): 3,000 posts</li></ul><h3>Eligibility Criteria</h3><p><strong>Educational Qualification:</strong></p><ul><li>Group D: 10th Pass / ITI</li><li>NTPC: 12th Pass / Graduation (as per post)</li><li>Technician: 10th + ITI in relevant trade</li><li>JE: B.E./B.Tech in relevant discipline</li></ul><p><strong>Age Limit:</strong> 18 to 36 years (relaxation as per government norms)</p><h3>How to Apply</h3><ol><li>Visit the RRB official website</li><li>Register with valid email and mobile number</li><li>Fill in personal, educational, and other details</li><li>Upload photograph and signature</li><li>Pay the application fee</li><li>Submit and save the confirmation page</li></ol><h3>Important Dates</h3><p>Application Start Date: January 15, 2025<br>Last Date to Apply: February 28, 2025<br>Exam Date: April-May 2025 (Tentative)</p>',
                'category' => 'Recruitment',
                'publish_date' => '2024-12-20',
            ],
            [
                'title' => 'IBPS PO 2024 Notification Out – 4,500+ Vacancies',
                'short_description' => 'Institute of Banking Personnel Selection releases notification for Probationary Officer recruitment. Check eligibility and apply now.',
                'content' => '<h2>IBPS PO 2024 Recruitment Notification</h2><p>The Institute of Banking Personnel Selection (IBPS) has released the official notification for the recruitment of Probationary Officers (PO) in participating public sector banks. This is one of the most awaited banking examinations in India.</p><h3>Vacancy Breakdown</h3><p>A total of 4,500+ vacancies have been announced across participating banks including SBI, PNB, Bank of Baroda, Canara Bank, Union Bank, Indian Bank, and others.</p><h3>Selection Process</h3><ul><li><strong>Prelims:</strong> 100 marks – English, Quantitative Aptitude, Reasoning</li><li><strong>Mains:</strong> 200 marks + 25 marks Descriptive – English, Data Analysis, Reasoning, General Awareness, Computer Aptitude</li><li><strong>Interview:</strong> 100 marks</li></ul><h3>Eligibility</h3><p><strong>Education:</strong> Graduation in any discipline from a recognized university</p><p><strong>Age:</strong> 20-30 years (relaxation as per category)</p><h3>Salary & Benefits</h3><p>Selected candidates will receive a starting basic pay of ₹36,000/- with DA, HRA, and other allowances. The total in-hand salary ranges from ₹45,000 to ₹55,000 depending on the posting location.</p>',
                'category' => 'Government Jobs',
                'publish_date' => '2024-12-18',
            ],
            [
                'title' => 'New Education Policy 2024 – Key Changes Explained',
                'short_description' => 'Government announces significant updates to the National Education Policy. Here is everything you need to know about the changes.',
                'content' => '<h2>National Education Policy 2024 Updates</h2><p>The Ministry of Education has announced several key amendments and updates to the National Education Policy (NEP) 2020, bringing significant changes to the Indian education landscape. These changes aim to make education more accessible, flexible, and aligned with global standards.</p><h3>Key Changes</h3><h4>1. Four-Year Undergraduate Program</h4><p>The new policy emphasizes the implementation of a four-year undergraduate degree program with multiple exit points. Students can exit after one year with a Certificate, after two years with a Diploma, after three years with a Degree, and after four years with a Degree with Research.</p><h4>2. Academic Bank of Credits</h4><p>The Academic Bank of Credits (ABC) system allows students to accumulate credits from different institutions and programs. This promotes flexibility and allows students to design their own educational pathways.</p><h4>3. Multidisciplinary Approach</h4><p>Universities and colleges are now required to offer multidisciplinary programs. Students can combine subjects from different streams – for example, studying Physics with Music or Mathematics with Literature.</p><h4>4. Digital Education</h4><p>A major thrust has been given to digital education with the establishment of a National Digital Education Architecture (NDEAR). This includes virtual labs, digital libraries, and AI-based personalized learning platforms.</p><h3>Impact on Students</h3><p>These changes are expected to benefit millions of students across India by providing more flexibility, better quality education, and improved employment outcomes. The emphasis on skill development and vocational training alongside academic education is expected to bridge the gap between education and industry requirements.</p>',
                'category' => 'Education',
                'publish_date' => '2024-12-12',
            ],
            [
                'title' => 'RRB NTPC Admit Card 2024 Available for Download',
                'short_description' => 'Railway Recruitment Board has released NTPC CBT-1 admit cards for all zones. Download your hall ticket before the exam date.',
                'content' => '<h2>RRB NTPC 2024 Admit Card</h2><p>The Railway Recruitment Board has released the admit cards for the Non-Technical Popular Categories (NTPC) Computer Based Test (CBT-1) 2024. Candidates from all RRB zones can download their admit cards from their respective regional RRB websites.</p><h3>Zone-wise Admit Card Links</h3><ul><li>RRB Allahabad</li><li>RRB Bangalore</li><li>RRB Chandigarh</li><li>RRB Chennai</li><li>RRB Delhi (Ghaziabad)</li><li>RRB Kolkata</li><li>RRB Mumbai</li></ul><h3>Exam Schedule</h3><p>The CBT-1 examination will be conducted in multiple phases starting from January 2025. Candidates should check their admit card carefully for their specific exam date and shift timing.</p><h3>What to Carry to Exam Center</h3><ul><li>Printed admit card</li><li>Valid photo ID (Aadhar, PAN, Voter ID, Passport)</li><li>Passport size photographs</li><li>PWD certificate (if applicable)</li></ul><p>Candidates are advised to reach the examination center at least 60 minutes before the reporting time mentioned on the admit card.</p>',
                'category' => 'Admit Card',
                'publish_date' => '2024-12-22',
            ],
            [
                'title' => 'CBSE Board Results 2024 – Class 10 & 12 Pass Percentage',
                'short_description' => 'Central Board of Secondary Education announces board exam results. Overall pass percentage shows improvement from last year.',
                'content' => '<h2>CBSE Board Results 2024</h2><p>The Central Board of Secondary Education (CBSE) has declared the results for Class 10 and Class 12 board examinations 2024. The results show a significant improvement in the overall pass percentage compared to the previous year.</p><h3>Class 12 Results</h3><ul><li>Overall Pass Percentage: 93.2%</li><li>Girls Pass Percentage: 95.4%</li><li>Boys Pass Percentage: 91.1%</li><li>Trivandrum Region topped with 97.3%</li></ul><h3>Class 10 Results</h3><ul><li>Overall Pass Percentage: 94.5%</li><li>Girls Pass Percentage: 96.1%</li><li>Boys Pass Percentage: 93.0%</li><li>Bengaluru Region topped with 98.1%</li></ul><h3>How to Check Results</h3><ol><li>Visit cbseresults.nic.in</li><li>Select Class 10 or Class 12</li><li>Enter Roll Number and Date of Birth</li><li>View and download your result</li></ol><h3>Re-evaluation Process</h3><p>Students who are not satisfied with their marks can apply for re-evaluation within 15 days of result declaration. The re-evaluation fee is ₹500 per subject.</p>',
                'category' => 'Results',
                'publish_date' => '2024-12-08',
            ],
            [
                'title' => 'SSC CHSL 2024 Recruitment – 5,000+ Posts',
                'short_description' => 'Staff Selection Commission announces Combined Higher Secondary Level examination for Lower Division Clerk, Data Entry Operator posts.',
                'content' => '<h2>SSC CHSL 2024 Recruitment</h2><p>The Staff Selection Commission has released the notification for Combined Higher Secondary Level (CHSL) Examination 2024. This examination is conducted for the recruitment of Lower Division Clerk (LDC), Junior Secretariat Assistant (JSA), Postal Assistant (PA), Sorting Assistant (SA), and Data Entry Operator (DEO) in various government departments.</p><h3>Vacancy Details</h3><ul><li>LDC/JSA: 2,500 posts</li><li>PA/SA: 1,500 posts</li><li>DEO: 1,000 posts</li></ul><h3>Eligibility</h3><p><strong>Education:</strong> 12th Pass (Higher Secondary) from a recognized Board</p><p><strong>Age:</strong> 18-27 years for LDC/JSA/PA/SA, 18-25 years for DEO</p><h3>Exam Pattern (Tier-I)</h3><table><tr><th>Subject</th><th>Questions</th><th>Marks</th></tr><tr><td>General Intelligence</td><td>25</td><td>50</td></tr><tr><td>English Language</td><td>25</td><td>50</td></tr><tr><td>Quantitative Aptitude</td><td>25</td><td>50</td></tr><tr><td>General Awareness</td><td>25</td><td>50</td></tr></table><h3>Salary</h3><p>Pay Level-2 (₹19,900 - ₹63,200) for LDC/JSA posts. Additionally, benefits like DA, HRA, Transport Allowance are provided as per central government norms.</p>',
                'category' => 'Recruitment',
                'publish_date' => '2024-12-25',
            ],
            [
                'title' => 'State PSC Jobs 2024 – Multiple State Vacancies',
                'short_description' => 'Various State Public Service Commissions announce recruitment for administrative and civil services positions across India.',
                'content' => '<h2>State Public Service Commission Recruitment 2024</h2><p>Multiple State Public Service Commissions across India have announced recruitment drives for various administrative and civil services positions. This comprehensive guide covers the major state PSC examinations and their details.</p><h3>UPPSC (Uttar Pradesh)</h3><ul><li>Posts: PCS, RO/ARO, ACF/RFO</li><li>Total Vacancies: 1,200+</li><li>Application Deadline: January 2025</li></ul><h3>MPSC (Maharashtra)</h3><ul><li>Posts: State Services, Engineering Services</li><li>Total Vacancies: 800+</li><li>Exam: March 2025</li></ul><h3>BPSC (Bihar)</h3><ul><li>Posts: 70th Combined (Mains)</li><li>Total Vacancies: 2,000+</li><li>Status: Applications Open</li></ul><h3>Common Preparation Strategy</h3><p>State PSC examinations require a focused preparation approach:</p><ol><li>Study the specific state syllabus carefully</li><li>Focus on state-specific general knowledge</li><li>Practice previous year question papers</li><li>Join test series for regular assessment</li><li>Read local newspapers for current affairs</li></ol><p>Each state PSC has its own examination pattern and selection process. Candidates are advised to check the official notifications for detailed information.</p>',
                'category' => 'Government Jobs',
                'publish_date' => '2024-12-05',
            ],
            [
                'title' => 'Top 10 Scholarships for Students in 2025',
                'short_description' => 'Comprehensive list of top scholarships available for Indian students across various academic levels and categories.',
                'content' => '<h2>Top 10 Scholarships for Students in 2025</h2><p>Education is the cornerstone of development, and financial constraints should never be a barrier to pursuing academic dreams. Here is a comprehensive guide to the top 10 scholarships available for Indian students in 2025.</p><h3>1. Prime Minister Scholarship Scheme</h3><p>For wards of ex-servicemen and central armed forces. Amount: ₹3,000/month for boys, ₹3,600/month for girls.</p><h3>2. National Means-cum-Merit Scholarship</h3><p>For Class 9-12 students from economically weaker sections. Amount: ₹12,000/year.</p><h3>3. Post Matric Scholarship for SC/ST Students</h3><p>Covers tuition fees, maintenance allowance, and other expenses for SC/ST students pursuing post-matriculation education.</p><h3>4. Inspire Scholarship (DST)</h3><p>For students pursuing natural and basic science courses at BSc and MSc level. Amount: ₹80,000/year.</p><h3>5. Maulana Azad National Fellowship</h3><p>For minority community students pursuing M.Phil and Ph.D. JRF: ₹31,000/month, SRF: ₹35,000/month.</p><h3>6. AICTE Pragati Scholarship for Girls</h3><p>For girls pursuing technical education. Amount: ₹50,000/year.</p><h3>7. Kishore Vaigyanik Protsahan Yojana (KVPY)</h3><p>For students interested in research careers in basic sciences. Amount: ₹5,000-₹7,000/month.</p><h3>8. Sitaram Jindal Foundation Scholarship</h3><p>For students from economically weaker families. Amount varies by course level.</p><h3>9. LIC Golden Jubilee Scholarship</h3><p>For students who have passed Class 10/12 with good marks. Amount: ₹20,000/year.</p><h3>10. Central Sector Scheme of Scholarship</h3><p>For college and university students. Amount: ₹10,000-₹20,000/year.</p><h3>How to Apply</h3><p>Most scholarships are available through the National Scholarship Portal (scholarships.gov.in). Students should regularly check the portal and apply before the deadlines.</p>',
                'category' => 'Education',
                'publish_date' => '2024-12-28',
            ],
            [
                'title' => 'GATE 2025 Admit Card – Download Link Active',
                'short_description' => 'IIT Delhi releases GATE 2025 admit card on the official website. Candidates can download using their enrollment ID.',
                'content' => '<h2>GATE 2025 Admit Card Released</h2><p>The Indian Institute of Technology (IIT) Delhi, the organizing institute for GATE 2025, has released the admit cards for the Graduate Aptitude Test in Engineering. Candidates who have successfully registered can download their admit cards from the official GATE website.</p><h3>Download Steps</h3><ol><li>Visit gate2025.iitd.ac.in</li><li>Login with Enrollment ID and Password</li><li>Click on "Download Admit Card"</li><li>Verify all details carefully</li><li>Print on A4 size paper</li></ol><h3>Exam Schedule</h3><p>GATE 2025 will be conducted on February 1, 2, 15, and 16, 2025. The examination will be held in two sessions: Forenoon (9:30 AM - 12:30 PM) and Afternoon (2:30 PM - 5:30 PM).</p><h3>Important Instructions</h3><ul><li>Reach the exam center 60 minutes before exam time</li><li>Carry valid photo ID along with admit card</li><li>No electronic devices allowed inside exam hall</li><li>Simple calculator may be allowed for some papers</li></ul><p>GATE score is valid for 3 years and is used for admissions to IITs, NITs, and other premier institutions for M.Tech/PhD programs. It is also used by many PSUs for recruitment.</p>',
                'category' => 'Admit Card',
                'publish_date' => '2025-01-02',
            ],
            [
                'title' => 'Defence Ministry Recruitment 2024 – 8,000 Posts',
                'short_description' => 'Ministry of Defence announces recruitment for civilian posts across Army, Navy, and Air Force establishments nationwide.',
                'content' => '<h2>Defence Ministry Civilian Recruitment 2024</h2><p>The Ministry of Defence has announced a large-scale recruitment drive for civilian posts in Army, Navy, and Air Force establishments across India. With over 8,000 vacancies, this is one of the biggest recruitment drives by the defence sector this year.</p><h3>Category-wise Vacancies</h3><ul><li>Group B (Non-Gazetted): 1,500 posts</li><li>Group C: 4,500 posts</li><li>Tradesman/Fireman: 2,000 posts</li></ul><h3>Educational Qualification</h3><p>Varies by post – from 8th Pass to Graduation depending on the position. Technical posts require ITI/Diploma in relevant trades.</p><h3>Selection Process</h3><ol><li>Written Examination</li><li>Skill Test / Trade Test (where applicable)</li><li>Physical Standards Test (for certain posts)</li><li>Document Verification</li><li>Medical Examination</li></ol><h3>Benefits of Defence Civilian Jobs</h3><ul><li>Job security under Central Government</li><li>7th Pay Commission salary</li><li>Free medical facilities at military hospitals</li><li>Canteen (CSD) facilities</li><li>Government housing (where available)</li><li>LTC and other travel benefits</li></ul><p>Interested candidates should apply through the official website within the stipulated timeframe. Detailed notifications are available zone-wise.</p>',
                'category' => 'Government Jobs',
                'publish_date' => '2025-01-05',
            ],
        ];

        foreach ($blogs as $blogData) {
            $category = $categories->where('name', $blogData['category'])->first();
            if ($category) {
                Blog::firstOrCreate(
                    ['slug' => Str::slug($blogData['title'])],
                    [
                        'title' => $blogData['title'],
                        'slug' => Str::slug($blogData['title']),
                        'short_description' => $blogData['short_description'],
                        'content' => $blogData['content'],
                        'category_id' => $category->id,
                        'publish_date' => $blogData['publish_date'],
                        'status' => 'published',
                    ]
                );
            }
        }
    }
}
