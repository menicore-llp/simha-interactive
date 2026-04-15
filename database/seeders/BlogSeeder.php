<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Blog;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $blogs = [
            [
                'title' => 'The Architecture of Brand Storytelling',
                'slug' => 'architecture-brand-storytelling',
                'short_description' => 'Unpacking how successful modern agencies use multi-dimensional branding, aesthetics, and rich visuals to form emotional connections with audiences globally.',
                'content' => '<p>Brands today exist in a hyper-competitive digital landscape. Simple logos and color palettes are no longer enough to retain attention. It requires multi-dimensional thinking and deep strategic engagement.</p><br/><p>By intertwining high-fidelity 3D visualization and AR implementations with classic graphic design, an agency can build a world, not just a brand. In this post, we explore exactly how Simha Interactive pioneers this method inside high-end campaigns.</p>',
                'status' => 'published',
                'publish_date' => now()->subDays(2),
                'category' => 'strategy',
                'tags' => 'Branding, Storytelling, 3D',
                'author' => 'Simha Editorial'
            ],
            [
                'title' => 'Immersive Engagement: Why AR is the Future',
                'slug' => 'immersive-engagement-ar-future',
                'short_description' => 'A deep dive into how Augmented Reality transforms physical marketing into digital touchpoints, increasing conversion and retention exponentially.',
                'content' => '<p>The boundary between the physical and digital world is rapidly eroding. Users no longer just want to read content; they want to experience it. Augmented Reality (AR) facilitates this bridge.</p><br/><p>With our recent campaigns utilizing holographic anamorphic projections, we recorded a 400% increase in audience dwell time. The statistics speak for themselves—immersing a user builds trust far faster than traditional 2D advertising.</p>',
                'status' => 'published',
                'publish_date' => now()->subDays(5),
                'category' => 'technology',
                'tags' => 'AR, VR, Marketing, Tech',
                'author' => 'Simha Tech Team'
            ],
            [
                'title' => 'Mastering Dark Mode Design Patterns',
                'slug' => 'mastering-dark-mode-design',
                'short_description' => 'Exploring the psychological and aesthetic advantages of pitch-dark UI designs, glowing accents, and proper spacing for premium SaaS and agency websites.',
                'content' => '<p>Designing a beautiful dark mode UI isn\'t just about flipping white backgrounds to black. It\'s an entire reconfiguration of spatial balance, typography weight, and color saturation.</p><br/><p>In this quick study, we examine our usage of the #080808 backdrop paired with high-voltage orange accents. It creates undeniable hierarchy, steering the user’s eye exactly where it needs to go without straining visual limits.</p>',
                'status' => 'published',
                'publish_date' => now()->subDays(10),
                'category' => 'design',
                'tags' => 'UI, UX, Web Design, Dark Mode',
                'author' => 'Simha Editorial'
            ],
        ];

        foreach ($blogs as $blog) {
            Blog::create($blog);
        }
    }
}
