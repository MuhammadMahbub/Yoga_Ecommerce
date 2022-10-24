<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $blogs = Blog::all();
        if($blogs->count() > 0){
            foreach($blogs as $blog){
                $blog->delete();
            }
        }

        Blog::create([
            'title' => 'Il était une fois : Gaia Stella en reprehenderit9',
            'image' => 'blog1.jpg',
            'short_description' => 'Duis aute irure dolor in reprehenderit in velit esse cillum dolore eu fugiat nulla pariatur.',
            'description' => '<h1>Yoga Classes for Discover Outdoors</h1>
            <p>Recently I was out to dinner with a <a href="#">big group of colleagues</a>, chatting while we waited to be seated in a restaurant. I didn’t notice the sudden lull that had come over the group until someone commented, “So we’re all doing
                this, huh?”</p>
            <h2>And <a href="#">resigned</a> in the act (h2)</h2>
            <p>Most of us were looking at our phones. And resigned in the act, too — no pretense of apology, no genuine sense that it was inappropriate or impolite. Once acknowledged, more people took phones out, and we all began concentrating on them
                in earnest rather than guiltily, enjoying the permission to indulge in the few minutes of relief we all knew we all wanted.</p>
            <h3>Despite the <a href="#">finger-wagging</a> modern (h3)</h3>
            <p>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the constellation of diversions
                that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</p>
            <h4>The obligation to <a href="#">provide your full attention</a> to any one person or thing for a sustained (h4)</h4>
            <p>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the constellation of diversions
                that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</p>
            <h5>The phone, and the <a href="#">constellation</a> of diversions that it (h5)</h5>
            <p>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the constellation of diversions
                that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</p>
            <img class="size-full" src="images/content/post0.html" alt="">
            <p>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the constellation of diversions
                that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</p>
            <img class="alignleft" src="images/content/post01.html" alt="">
            <p>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the constellation of diversions
                that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</p>
            <img class="alignright" src="images/content/post01.html" alt="">
            <p>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the constellation of diversions
                that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</p>
            <img class="aligncenter" src="images/content/post01.html" alt="">
            <p>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the constellation of diversions
                that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</p>
            <ul>
                <li>Despite the finger-wagging modern etiquette pieces</li>
                <li>The obligation to provide your <a href="#">full attention to any</a> one person or thing for a sustained period of time is becoming more difficult to meet.</li>
                <li>The phone, and the constellation of diversions that live inside it</li>
                <li>All of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</li>
                <li>I didn’t notice the sudden lull that had come over the group until someone commented, “So we’re all doing this, huh?”</li>
            </ul>
            <ol>
                <li>Despite the finger-wagging modern etiquette pieces</li>
                <li>The obligation to provide your <a href="#">full attention to any</a> one person or thing for a sustained period of time is becoming more difficult to meet.</li>
                <li>The phone, and the constellation of diversions that live inside it</li>
                <li>All of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</li>
                <li>I didn’t notice the sudden lull that had come over the group until someone commented, “So we’re all doing this, huh?”</li>
            </ol>

            <p>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the constellation of diversions
                that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</p>
            <blockquote>
                <p>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the <a href="#">constellation of diversions</a>                        that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</p>
            </blockquote>
            <p>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the constellation of diversions
                that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</p>',
            'status' => 'active',
        ]);
        Blog::create([
            'title' => 'Vous êtes ce que vous Yoga8',
            'image' => 'blog2.jpg',
            'short_description' => 'Duis aute irure dolor in reprehenderit in velit esse cillum dolore eu fugiat nulla pariatur.',
            'description' => '<h1>Yoga Classes for Discover Outdoors</h1>
            <p>Recently I was out to dinner with a <a href="#">big group of colleagues</a>, chatting while we waited to be seated in a restaurant. I didn’t notice the sudden lull that had come over the group until someone commented, “So we’re all doing
                this, huh?”</p>
            <h2>And <a href="#">resigned</a> in the act (h2)</h2>
            <p>Most of us were looking at our phones. And resigned in the act, too — no pretense of apology, no genuine sense that it was inappropriate or impolite. Once acknowledged, more people took phones out, and we all began concentrating on them
                in earnest rather than guiltily, enjoying the permission to indulge in the few minutes of relief we all knew we all wanted.</p>
            <h3>Despite the <a href="#">finger-wagging</a> modern (h3)</h3>
            <p>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the constellation of diversions
                that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</p>
            <h4>The obligation to <a href="#">provide your full attention</a> to any one person or thing for a sustained (h4)</h4>
            <p>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the constellation of diversions
                that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</p>
            <h5>The phone, and the <a href="#">constellation</a> of diversions that it (h5)</h5>
            <p>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the constellation of diversions
                that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</p>
            <img class="size-full" src="images/content/post0.html" alt="">
            <p>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the constellation of diversions
                that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</p>
            <img class="alignleft" src="images/content/post01.html" alt="">
            <p>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the constellation of diversions
                that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</p>
            <img class="alignright" src="images/content/post01.html" alt="">
            <p>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the constellation of diversions
                that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</p>
            <img class="aligncenter" src="images/content/post01.html" alt="">
            <p>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the constellation of diversions
                that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</p>
            <ul>
                <li>Despite the finger-wagging modern etiquette pieces</li>
                <li>The obligation to provide your <a href="#">full attention to any</a> one person or thing for a sustained period of time is becoming more difficult to meet.</li>
                <li>The phone, and the constellation of diversions that live inside it</li>
                <li>All of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</li>
                <li>I didn’t notice the sudden lull that had come over the group until someone commented, “So we’re all doing this, huh?”</li>
            </ul>
            <ol>
                <li>Despite the finger-wagging modern etiquette pieces</li>
                <li>The obligation to provide your <a href="#">full attention to any</a> one person or thing for a sustained period of time is becoming more difficult to meet.</li>
                <li>The phone, and the constellation of diversions that live inside it</li>
                <li>All of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</li>
                <li>I didn’t notice the sudden lull that had come over the group until someone commented, “So we’re all doing this, huh?”</li>
            </ol>

            <p>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the constellation of diversions
                that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</p>
            <blockquote>
                <p>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the <a href="#">constellation of diversions</a>                        that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</p>
            </blockquote>
            <p>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the constellation of diversions
                that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</p>',
            'status' => 'active',
        ]);
        Blog::create([
            'title' => 'Pourquoi vous ne devriez pas aller au yoga7',
            'image' => 'blog3.jpg',
            'short_description' => 'Duis aute irure dolor in reprehenderit in velit esse cillum dolore eu fugiat nulla pariatur.',
            'description' => '<h1>Yoga Classes for Discover Outdoors</h1>
            <p>Recently I was out to dinner with a <a href="#">big group of colleagues</a>, chatting while we waited to be seated in a restaurant. I didn’t notice the sudden lull that had come over the group until someone commented, “So we’re all doing
                this, huh?”</p>
            <h2>And <a href="#">resigned</a> in the act (h2)</h2>
            <p>Most of us were looking at our phones. And resigned in the act, too — no pretense of apology, no genuine sense that it was inappropriate or impolite. Once acknowledged, more people took phones out, and we all began concentrating on them
                in earnest rather than guiltily, enjoying the permission to indulge in the few minutes of relief we all knew we all wanted.</p>
            <h3>Despite the <a href="#">finger-wagging</a> modern (h3)</h3>
            <p>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the constellation of diversions
                that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</p>
            <h4>The obligation to <a href="#">provide your full attention</a> to any one person or thing for a sustained (h4)</h4>
            <p>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the constellation of diversions
                that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</p>
            <h5>The phone, and the <a href="#">constellation</a> of diversions that it (h5)</h5>
            <p>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the constellation of diversions
                that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</p>
            <img class="size-full" src="images/content/post0.html" alt="">
            <p>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the constellation of diversions
                that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</p>
            <img class="alignleft" src="images/content/post01.html" alt="">
            <p>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the constellation of diversions
                that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</p>
            <img class="alignright" src="images/content/post01.html" alt="">
            <p>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the constellation of diversions
                that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</p>
            <img class="aligncenter" src="images/content/post01.html" alt="">
            <p>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the constellation of diversions
                that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</p>
            <ul>
                <li>Despite the finger-wagging modern etiquette pieces</li>
                <li>The obligation to provide your <a href="#">full attention to any</a> one person or thing for a sustained period of time is becoming more difficult to meet.</li>
                <li>The phone, and the constellation of diversions that live inside it</li>
                <li>All of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</li>
                <li>I didn’t notice the sudden lull that had come over the group until someone commented, “So we’re all doing this, huh?”</li>
            </ul>
            <ol>
                <li>Despite the finger-wagging modern etiquette pieces</li>
                <li>The obligation to provide your <a href="#">full attention to any</a> one person or thing for a sustained period of time is becoming more difficult to meet.</li>
                <li>The phone, and the constellation of diversions that live inside it</li>
                <li>All of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</li>
                <li>I didn’t notice the sudden lull that had come over the group until someone commented, “So we’re all doing this, huh?”</li>
            </ol>

            <p>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the constellation of diversions
                that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</p>
            <blockquote>
                <p>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the <a href="#">constellation of diversions</a>                        that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</p>
            </blockquote>
            <p>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the constellation of diversions
                that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</p>',
            'status' => 'active',
        ]);
        Blog::create([
            'title' => 'C’era una volta: Gaia Stella6',
            'image' => 'blog4.jpg',
            'short_description' => 'Duis aute irure dolor in reprehenderit in velit esse cillum dolore eu fugiat nulla pariatur.',
            'description' => '<h1>Yoga Classes for Discover Outdoors</h1>
            <p>Recently I was out to dinner with a <a href="#">big group of colleagues</a>, chatting while we waited to be seated in a restaurant. I didn’t notice the sudden lull that had come over the group until someone commented, “So we’re all doing
                this, huh?”</p>
            <h2>And <a href="#">resigned</a> in the act (h2)</h2>
            <p>Most of us were looking at our phones. And resigned in the act, too — no pretense of apology, no genuine sense that it was inappropriate or impolite. Once acknowledged, more people took phones out, and we all began concentrating on them
                in earnest rather than guiltily, enjoying the permission to indulge in the few minutes of relief we all knew we all wanted.</p>
            <h3>Despite the <a href="#">finger-wagging</a> modern (h3)</h3>
            <p>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the constellation of diversions
                that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</p>
            <h4>The obligation to <a href="#">provide your full attention</a> to any one person or thing for a sustained (h4)</h4>
            <p>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the constellation of diversions
                that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</p>
            <h5>The phone, and the <a href="#">constellation</a> of diversions that it (h5)</h5>
            <p>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the constellation of diversions
                that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</p>
            <img class="size-full" src="images/content/post0.html" alt="">
            <p>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the constellation of diversions
                that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</p>
            <img class="alignleft" src="images/content/post01.html" alt="">
            <p>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the constellation of diversions
                that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</p>
            <img class="alignright" src="images/content/post01.html" alt="">
            <p>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the constellation of diversions
                that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</p>
            <img class="aligncenter" src="images/content/post01.html" alt="">
            <p>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the constellation of diversions
                that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</p>
            <ul>
                <li>Despite the finger-wagging modern etiquette pieces</li>
                <li>The obligation to provide your <a href="#">full attention to any</a> one person or thing for a sustained period of time is becoming more difficult to meet.</li>
                <li>The phone, and the constellation of diversions that live inside it</li>
                <li>All of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</li>
                <li>I didn’t notice the sudden lull that had come over the group until someone commented, “So we’re all doing this, huh?”</li>
            </ul>
            <ol>
                <li>Despite the finger-wagging modern etiquette pieces</li>
                <li>The obligation to provide your <a href="#">full attention to any</a> one person or thing for a sustained period of time is becoming more difficult to meet.</li>
                <li>The phone, and the constellation of diversions that live inside it</li>
                <li>All of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</li>
                <li>I didn’t notice the sudden lull that had come over the group until someone commented, “So we’re all doing this, huh?”</li>
            </ol>

            <p>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the constellation of diversions
                that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</p>
            <blockquote>
                <p>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the <a href="#">constellation of diversions</a>                        that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</p>
            </blockquote>
            <p>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the constellation of diversions
                that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</p>',
            'status' => 'active',
        ]);
        Blog::create([
            'title' => 'C’era una volta: Gaia Stella in reprehenderit5',
            'image' => 'blog5.jpg',
            'short_description' => 'Duis aute irure dolor in reprehenderit in velit esse cillum dolore eu fugiat nulla pariatur.',
            'description' => '<h1>Yoga Classes for Discover Outdoors</h1>
            <p>Recently I was out to dinner with a <a href="#">big group of colleagues</a>, chatting while we waited to be seated in a restaurant. I didn’t notice the sudden lull that had come over the group until someone commented, “So we’re all doing
                this, huh?”</p>
            <h2>And <a href="#">resigned</a> in the act (h2)</h2>
            <p>Most of us were looking at our phones. And resigned in the act, too — no pretense of apology, no genuine sense that it was inappropriate or impolite. Once acknowledged, more people took phones out, and we all began concentrating on them
                in earnest rather than guiltily, enjoying the permission to indulge in the few minutes of relief we all knew we all wanted.</p>
            <h3>Despite the <a href="#">finger-wagging</a> modern (h3)</h3>
            <p>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the constellation of diversions
                that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</p>
            <h4>The obligation to <a href="#">provide your full attention</a> to any one person or thing for a sustained (h4)</h4>
            <p>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the constellation of diversions
                that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</p>
            <h5>The phone, and the <a href="#">constellation</a> of diversions that it (h5)</h5>
            <p>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the constellation of diversions
                that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</p>
            <img class="size-full" src="images/content/post0.html" alt="">
            <p>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the constellation of diversions
                that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</p>
            <img class="alignleft" src="images/content/post01.html" alt="">
            <p>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the constellation of diversions
                that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</p>
            <img class="alignright" src="images/content/post01.html" alt="">
            <p>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the constellation of diversions
                that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</p>
            <img class="aligncenter" src="images/content/post01.html" alt="">
            <p>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the constellation of diversions
                that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</p>
            <ul>
                <li>Despite the finger-wagging modern etiquette pieces</li>
                <li>The obligation to provide your <a href="#">full attention to any</a> one person or thing for a sustained period of time is becoming more difficult to meet.</li>
                <li>The phone, and the constellation of diversions that live inside it</li>
                <li>All of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</li>
                <li>I didn’t notice the sudden lull that had come over the group until someone commented, “So we’re all doing this, huh?”</li>
            </ul>
            <ol>
                <li>Despite the finger-wagging modern etiquette pieces</li>
                <li>The obligation to provide your <a href="#">full attention to any</a> one person or thing for a sustained period of time is becoming more difficult to meet.</li>
                <li>The phone, and the constellation of diversions that live inside it</li>
                <li>All of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</li>
                <li>I didn’t notice the sudden lull that had come over the group until someone commented, “So we’re all doing this, huh?”</li>
            </ol>

            <p>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the constellation of diversions
                that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</p>
            <blockquote>
                <p>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the <a href="#">constellation of diversions</a>                        that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</p>
            </blockquote>
            <p>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the constellation of diversions
                that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</p>',
            'status' => 'active',
        ]);
        Blog::create([
            'title' => 'Pourquoi vous ne devriez pas aller au yoga7',
            'image' => 'blog6.jpg',
            'short_description' => 'Duis aute irure dolor in reprehenderit in velit esse cillum dolore eu fugiat nulla pariatur.',
            'description' => '<h1>Yoga Classes for Discover Outdoors</h1>
            <p>Recently I was out to dinner with a <a href="#">big group of colleagues</a>, chatting while we waited to be seated in a restaurant. I didn’t notice the sudden lull that had come over the group until someone commented, “So we’re all doing
                this, huh?”</p>
            <h2>And <a href="#">resigned</a> in the act (h2)</h2>
            <p>Most of us were looking at our phones. And resigned in the act, too — no pretense of apology, no genuine sense that it was inappropriate or impolite. Once acknowledged, more people took phones out, and we all began concentrating on them
                in earnest rather than guiltily, enjoying the permission to indulge in the few minutes of relief we all knew we all wanted.</p>
            <h3>Despite the <a href="#">finger-wagging</a> modern (h3)</h3>
            <p>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the constellation of diversions
                that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</p>
            <h4>The obligation to <a href="#">provide your full attention</a> to any one person or thing for a sustained (h4)</h4>
            <p>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the constellation of diversions
                that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</p>
            <h5>The phone, and the <a href="#">constellation</a> of diversions that it (h5)</h5>
            <p>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the constellation of diversions
                that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</p>
            <img class="size-full" src="images/content/post0.html" alt="">
            <p>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the constellation of diversions
                that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</p>
            <img class="alignleft" src="images/content/post01.html" alt="">
            <p>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the constellation of diversions
                that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</p>
            <img class="alignright" src="images/content/post01.html" alt="">
            <p>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the constellation of diversions
                that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</p>
            <img class="aligncenter" src="images/content/post01.html" alt="">
            <p>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the constellation of diversions
                that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</p>
            <ul>
                <li>Despite the finger-wagging modern etiquette pieces</li>
                <li>The obligation to provide your <a href="#">full attention to any</a> one person or thing for a sustained period of time is becoming more difficult to meet.</li>
                <li>The phone, and the constellation of diversions that live inside it</li>
                <li>All of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</li>
                <li>I didn’t notice the sudden lull that had come over the group until someone commented, “So we’re all doing this, huh?”</li>
            </ul>
            <ol>
                <li>Despite the finger-wagging modern etiquette pieces</li>
                <li>The obligation to provide your <a href="#">full attention to any</a> one person or thing for a sustained period of time is becoming more difficult to meet.</li>
                <li>The phone, and the constellation of diversions that live inside it</li>
                <li>All of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</li>
                <li>I didn’t notice the sudden lull that had come over the group until someone commented, “So we’re all doing this, huh?”</li>
            </ol>

            <p>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the constellation of diversions
                that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</p>
            <blockquote>
                <p>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the <a href="#">constellation of diversions</a>                        that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</p>
            </blockquote>
            <p>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the constellation of diversions
                that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</p>',
            'status' => 'active',
        ]);
        Blog::create([
            'title' => 'Pourquoi vous ne devriez pas aller au yoga3',
            'image' => 'blog7.jpg',
            'short_description' => 'Duis aute irure dolor in reprehenderit in velit esse cillum dolore eu fugiat nulla pariatur.',
            'description' => '<h1>Yoga Classes for Discover Outdoors</h1>
            <p>Recently I was out to dinner with a <a href="#">big group of colleagues</a>, chatting while we waited to be seated in a restaurant. I didn’t notice the sudden lull that had come over the group until someone commented, “So we’re all doing
                this, huh?”</p>
            <h2>And <a href="#">resigned</a> in the act (h2)</h2>
            <p>Most of us were looking at our phones. And resigned in the act, too — no pretense of apology, no genuine sense that it was inappropriate or impolite. Once acknowledged, more people took phones out, and we all began concentrating on them
                in earnest rather than guiltily, enjoying the permission to indulge in the few minutes of relief we all knew we all wanted.</p>
            <h3>Despite the <a href="#">finger-wagging</a> modern (h3)</h3>
            <p>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the constellation of diversions
                that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</p>
            <h4>The obligation to <a href="#">provide your full attention</a> to any one person or thing for a sustained (h4)</h4>
            <p>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the constellation of diversions
                that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</p>
            <h5>The phone, and the <a href="#">constellation</a> of diversions that it (h5)</h5>
            <p>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the constellation of diversions
                that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</p>
            <img class="size-full" src="images/content/post0.html" alt="">
            <p>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the constellation of diversions
                that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</p>
            <img class="alignleft" src="images/content/post01.html" alt="">
            <p>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the constellation of diversions
                that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</p>
            <img class="alignright" src="images/content/post01.html" alt="">
            <p>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the constellation of diversions
                that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</p>
            <img class="aligncenter" src="images/content/post01.html" alt="">
            <p>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the constellation of diversions
                that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</p>
            <ul>
                <li>Despite the finger-wagging modern etiquette pieces</li>
                <li>The obligation to provide your <a href="#">full attention to any</a> one person or thing for a sustained period of time is becoming more difficult to meet.</li>
                <li>The phone, and the constellation of diversions that live inside it</li>
                <li>All of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</li>
                <li>I didn’t notice the sudden lull that had come over the group until someone commented, “So we’re all doing this, huh?”</li>
            </ul>
            <ol>
                <li>Despite the finger-wagging modern etiquette pieces</li>
                <li>The obligation to provide your <a href="#">full attention to any</a> one person or thing for a sustained period of time is becoming more difficult to meet.</li>
                <li>The phone, and the constellation of diversions that live inside it</li>
                <li>All of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</li>
                <li>I didn’t notice the sudden lull that had come over the group until someone commented, “So we’re all doing this, huh?”</li>
            </ol>

            <p>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the constellation of diversions
                that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</p>
            <blockquote>
                <p>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the <a href="#">constellation of diversions</a>                        that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</p>
            </blockquote>
            <p>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the constellation of diversions
                that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</p>',
            'status' => 'active',
        ]);
        Blog::create([
            'title' => 'C’era una volta: Gaia Stella in reprehenderit2',
            'image' => 'blog8.jpg',
            'short_description' => 'Duis aute irure dolor in reprehenderit in velit esse cillum dolore eu fugiat nulla pariatur.',
            'description' => '<h1>Yoga Classes for Discover Outdoors</h1>
            <p>Recently I was out to dinner with a <a href="#">big group of colleagues</a>, chatting while we waited to be seated in a restaurant. I didn’t notice the sudden lull that had come over the group until someone commented, “So we’re all doing
                this, huh?”</p>
            <h2>And <a href="#">resigned</a> in the act (h2)</h2>
            <p>Most of us were looking at our phones. And resigned in the act, too — no pretense of apology, no genuine sense that it was inappropriate or impolite. Once acknowledged, more people took phones out, and we all began concentrating on them
                in earnest rather than guiltily, enjoying the permission to indulge in the few minutes of relief we all knew we all wanted.</p>
            <h3>Despite the <a href="#">finger-wagging</a> modern (h3)</h3>
            <p>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the constellation of diversions
                that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</p>
            <h4>The obligation to <a href="#">provide your full attention</a> to any one person or thing for a sustained (h4)</h4>
            <p>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the constellation of diversions
                that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</p>
            <h5>The phone, and the <a href="#">constellation</a> of diversions that it (h5)</h5>
            <p>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the constellation of diversions
                that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</p>
            <img class="size-full" src="images/content/post0.html" alt="">
            <p>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the constellation of diversions
                that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</p>
            <img class="alignleft" src="images/content/post01.html" alt="">
            <p>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the constellation of diversions
                that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</p>
            <img class="alignright" src="images/content/post01.html" alt="">
            <p>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the constellation of diversions
                that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</p>
            <img class="aligncenter" src="images/content/post01.html" alt="">
            <p>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the constellation of diversions
                that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</p>
            <ul>
                <li>Despite the finger-wagging modern etiquette pieces</li>
                <li>The obligation to provide your <a href="#">full attention to any</a> one person or thing for a sustained period of time is becoming more difficult to meet.</li>
                <li>The phone, and the constellation of diversions that live inside it</li>
                <li>All of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</li>
                <li>I didn’t notice the sudden lull that had come over the group until someone commented, “So we’re all doing this, huh?”</li>
            </ul>
            <ol>
                <li>Despite the finger-wagging modern etiquette pieces</li>
                <li>The obligation to provide your <a href="#">full attention to any</a> one person or thing for a sustained period of time is becoming more difficult to meet.</li>
                <li>The phone, and the constellation of diversions that live inside it</li>
                <li>All of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</li>
                <li>I didn’t notice the sudden lull that had come over the group until someone commented, “So we’re all doing this, huh?”</li>
            </ol>

            <p>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the constellation of diversions
                that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</p>
            <blockquote>
                <p>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the <a href="#">constellation of diversions</a>                        that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</p>
            </blockquote>
            <p>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the constellation of diversions
                that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</p>',
            'status' => 'active',
        ]);
        Blog::create([
            'title' => 'Pourquoi vous ne devriez pas aller au yoga1',
            'image' => 'blog9.jpg',
            'short_description' => 'Duis aute irure dolor in reprehenderit in velit esse cillum dolore eu fugiat nulla pariatur.',
            'description' => '<h1>Yoga Classes for Discover Outdoors</h1>
            <p>Recently I was out to dinner with a <a href="#">big group of colleagues</a>, chatting while we waited to be seated in a restaurant. I didn’t notice the sudden lull that had come over the group until someone commented, “So we’re all doing
                this, huh?”</p>
            <h2>And <a href="#">resigned</a> in the act (h2)</h2>
            <p>Most of us were looking at our phones. And resigned in the act, too — no pretense of apology, no genuine sense that it was inappropriate or impolite. Once acknowledged, more people took phones out, and we all began concentrating on them
                in earnest rather than guiltily, enjoying the permission to indulge in the few minutes of relief we all knew we all wanted.</p>
            <h3>Despite the <a href="#">finger-wagging</a> modern (h3)</h3>
            <p>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the constellation of diversions
                that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</p>
            <h4>The obligation to <a href="#">provide your full attention</a> to any one person or thing for a sustained (h4)</h4>
            <p>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the constellation of diversions
                that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</p>
            <h5>The phone, and the <a href="#">constellation</a> of diversions that it (h5)</h5>
            <p>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the constellation of diversions
                that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</p>
            <img class="size-full" src="images/content/post0.html" alt="">
            <p>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the constellation of diversions
                that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</p>
            <img class="alignleft" src="images/content/post01.html" alt="">
            <p>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the constellation of diversions
                that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</p>
            <img class="alignright" src="images/content/post01.html" alt="">
            <p>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the constellation of diversions
                that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</p>
            <img class="aligncenter" src="images/content/post01.html" alt="">
            <p>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the constellation of diversions
                that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</p>
            <ul>
                <li>Despite the finger-wagging modern etiquette pieces</li>
                <li>The obligation to provide your <a href="#">full attention to any</a> one person or thing for a sustained period of time is becoming more difficult to meet.</li>
                <li>The phone, and the constellation of diversions that live inside it</li>
                <li>All of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</li>
                <li>I didn’t notice the sudden lull that had come over the group until someone commented, “So we’re all doing this, huh?”</li>
            </ul>
            <ol>
                <li>Despite the finger-wagging modern etiquette pieces</li>
                <li>The obligation to provide your <a href="#">full attention to any</a> one person or thing for a sustained period of time is becoming more difficult to meet.</li>
                <li>The phone, and the constellation of diversions that live inside it</li>
                <li>All of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</li>
                <li>I didn’t notice the sudden lull that had come over the group until someone commented, “So we’re all doing this, huh?”</li>
            </ol>

            <p>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the constellation of diversions
                that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</p>
            <blockquote>
                <p>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the <a href="#">constellation of diversions</a>                        that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</p>
            </blockquote>
            <p>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the constellation of diversions
                that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed  are just too compelling.</p>',
            'status' => 'active',
        ]);
    }
}
