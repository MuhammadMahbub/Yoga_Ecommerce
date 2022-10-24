<?php

namespace Database\Seeders;

use App\Models\ClassPricing;
use App\Models\ImageForClass;
use App\Models\PriceItem;
use App\Models\YogaClass;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $data1 = YogaClass::create([
            'title' => 'COURS DE YOGA À DÉCOUVRIR EN PLEIN AIR',
            'date' => '2023-09-19 00:00:00',
            'time' => '1pm-3pm',
            'price' => '59',
            'duration_in_days' => '5',
            'image' => '1.jpg',
            'video' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/vQkXF5__TQI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'short_description' => 'Dans le sanctuaire dun studio de yoga, dune retraite ou dun endroit tranquille à la campagne, il est plus facile de se sentir en paix. Dans le sanctuaire dun studio de yoga, dun lieu de retraite ou dun endroit tranquille à la campagne.',
            'description' => "<div>Recently I was out to dinner with a <a href='#'>big group of colleagues</a>, chatting while we waited to be seated in a restaurant. I didn’t notice the sudden lull that had come over the group until someone commented, “So we’re all doing this, huh?”<br><br></div><div><br>And <a href='#'>resigned</a> in the act (h2)<br><br></div><div>Most of us were looking at our phones. And resigned in the act, too — no pretense of apology, no genuine sense that it was inappropriate or impolite. Once acknowledged, more people took phones out, and we all began concentrating on them in earnest rather than guiltily, enjoying the permission to indulge in the few minutes of relief we all knew we all wanted.<br><br></div><div><br>Despite the <a href='#'>finger-wagging</a> modern (h3)<br><br></div><div>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the constellation of diversions that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed are just too compelling.<br><br></div><div><br>The obligation to <a href='#'>provide your full attention</a> to any one person or thing for a sustained (h4)<br><br></div><div>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the constellation of diversions that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed are just too compelling.<br><br></div>",
        ]);
        $data2 = YogaClass::create([
            'title' => 'COURS DE YOGA À DÉCOUVRIR EN PLEIN AIR',
            'date' => '2023-03-19 00:00:00',
            'time' => '1pm-3pm',
            'price' => '59',
            'duration_in_days' => '6',
            'image' => '2.jpg',
            'video' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/vQkXF5__TQI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'short_description' => 'Dans le sanctuaire dun studio de yoga, dune retraite ou dun endroit tranquille à la campagne, il est plus facile de se sentir en paix. Dans le sanctuaire dun studio de yoga, dun lieu de retraite ou dun endroit tranquille à la campagne.',
            'description' => "<div>Recently I was out to dinner with a <a href='#'>big group of colleagues</a>, chatting while we waited to be seated in a restaurant. I didn’t notice the sudden lull that had come over the group until someone commented, “So we’re all doing this, huh?”<br><br></div><div><br>And <a href='#'>resigned</a> in the act (h2)<br><br></div><div>Most of us were looking at our phones. And resigned in the act, too — no pretense of apology, no genuine sense that it was inappropriate or impolite. Once acknowledged, more people took phones out, and we all began concentrating on them in earnest rather than guiltily, enjoying the permission to indulge in the few minutes of relief we all knew we all wanted.<br><br></div><div><br>Despite the <a href='#'>finger-wagging</a> modern (h3)<br><br></div><div>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the constellation of diversions that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed are just too compelling.<br><br></div><div><br>The obligation to <a href='#'>provide your full attention</a> to any one person or thing for a sustained (h4)<br><br></div><div>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the constellation of diversions that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed are just too compelling.<br><br></div>",
        ]);
        $data3 = YogaClass::create([
            'title' => 'COURS DE YOGA À DÉCOUVRIR EN PLEIN AIR',
            'date' => '2023-01-19 00:00:00',
            'time' => '1pm-3pm',
            'price' => '59', 
            'duration_in_days' => '7',
            'image' => '3.jpg',
            'video' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/vQkXF5__TQI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'short_description' => 'Dans le sanctuaire dun studio de yoga, dune retraite ou dun endroit tranquille à la campagne, il est plus facile de se sentir en paix. Dans le sanctuaire dun studio de yoga, dun lieu de retraite ou dun endroit tranquille à la campagne.',
            'description' => "<div>Recently I was out to dinner with a <a href='#'>big group of colleagues</a>, chatting while we waited to be seated in a restaurant. I didn’t notice the sudden lull that had come over the group until someone commented, “So we’re all doing this, huh?”<br><br></div><div><br>And <a href='#'>resigned</a> in the act (h2)<br><br></div><div>Most of us were looking at our phones. And resigned in the act, too — no pretense of apology, no genuine sense that it was inappropriate or impolite. Once acknowledged, more people took phones out, and we all began concentrating on them in earnest rather than guiltily, enjoying the permission to indulge in the few minutes of relief we all knew we all wanted.<br><br></div><div><br>Despite the <a href='#'>finger-wagging</a> modern (h3)<br><br></div><div>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the constellation of diversions that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed are just too compelling.<br><br></div><div><br>The obligation to <a href='#'>provide your full attention</a> to any one person or thing for a sustained (h4)<br><br></div><div>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the constellation of diversions that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed are just too compelling.<br><br></div>",
        ]);
        $data4 = YogaClass::create([
            'title' => 'COURS DE YOGA À DÉCOUVRIR EN PLEIN AIR',
            'date' => '2023-01-19 00:00:00',
            'time' => '1pm-3pm',
            'price' => '59', 
            'duration_in_days' => '7',
            'image' => '3.jpg',
            'video' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/vQkXF5__TQI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'short_description' => 'Dans le sanctuaire dun studio de yoga, dune retraite ou dun endroit tranquille à la campagne, il est plus facile de se sentir en paix. Dans le sanctuaire dun studio de yoga, dun lieu de retraite ou dun endroit tranquille à la campagne.',
            'description' => "<div>Recently I was out to dinner with a <a href='#'>big group of colleagues</a>, chatting while we waited to be seated in a restaurant. I didn’t notice the sudden lull that had come over the group until someone commented, “So we’re all doing this, huh?”<br><br></div><div><br>And <a href='#'>resigned</a> in the act (h2)<br><br></div><div>Most of us were looking at our phones. And resigned in the act, too — no pretense of apology, no genuine sense that it was inappropriate or impolite. Once acknowledged, more people took phones out, and we all began concentrating on them in earnest rather than guiltily, enjoying the permission to indulge in the few minutes of relief we all knew we all wanted.<br><br></div><div><br>Despite the <a href='#'>finger-wagging</a> modern (h3)<br><br></div><div>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the constellation of diversions that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed are just too compelling.<br><br></div><div><br>The obligation to <a href='#'>provide your full attention</a> to any one person or thing for a sustained (h4)<br><br></div><div>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the constellation of diversions that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed are just too compelling.<br><br></div>",
        ]);
        $data5 = YogaClass::create([
            'title' => 'COURS DE YOGA À DÉCOUVRIR EN PLEIN AIR',
            'date' => '2023-01-19 00:00:00',
            'time' => '1pm-3pm',
            'price' => '59', 
            'duration_in_days' => '7',
            'image' => '3.jpg',
            'video' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/vQkXF5__TQI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'short_description' => 'Dans le sanctuaire dun studio de yoga, dune retraite ou dun endroit tranquille à la campagne, il est plus facile de se sentir en paix. Dans le sanctuaire dun studio de yoga, dun lieu de retraite ou dun endroit tranquille à la campagne.',
            'description' => "<div>Recently I was out to dinner with a <a href='#'>big group of colleagues</a>, chatting while we waited to be seated in a restaurant. I didn’t notice the sudden lull that had come over the group until someone commented, “So we’re all doing this, huh?”<br><br></div><div><br>And <a href='#'>resigned</a> in the act (h2)<br><br></div><div>Most of us were looking at our phones. And resigned in the act, too — no pretense of apology, no genuine sense that it was inappropriate or impolite. Once acknowledged, more people took phones out, and we all began concentrating on them in earnest rather than guiltily, enjoying the permission to indulge in the few minutes of relief we all knew we all wanted.<br><br></div><div><br>Despite the <a href='#'>finger-wagging</a> modern (h3)<br><br></div><div>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the constellation of diversions that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed are just too compelling.<br><br></div><div><br>The obligation to <a href='#'>provide your full attention</a> to any one person or thing for a sustained (h4)<br><br></div><div>Despite the finger-wagging modern etiquette pieces, the obligation to provide your full attention to any one person or thing for a sustained period of time is becoming more difficult to meet. The phone, and the constellation of diversions that live inside it — emails, texts, Facebook, Twitter, Instagram, Reddit, Timehop, Google Hangouts, all of which can sprout badges of fire-red notifications demanding to be addressed are just too compelling.<br><br></div>",
        ]);
        
        $class1 = ClassPricing::create([
            'class_id' => $data1->id,
            'arrive_date' => Carbon::now()->addDay(3),
        ]);

        PriceItem::create([
            'pricing_id' => $class1->id,
            'person' => 1,
            'price' => 100,
            'room_info' => 'Chambre double partagée',
            'house_info' => 'Maison partagée - Chambre vue mer',
        ]);
        PriceItem::create([
            'pricing_id' => $class1->id,
            'person' => 2,
            'price' => 200,
            'room_info' => 'Chambre simple privée',
            'house_info' => 'Maison partagée - Chambre vue mer',
        ]);

        $class2 = ClassPricing::create([
            'class_id' => $data2->id,
            'arrive_date' => Carbon::now()->addDay(3),
        ]);
        PriceItem::create([
            'pricing_id' => $class2->id,
            'person' => 1,
            'price' => 100,
            'room_info' => 'Chambre double partagée',
            'house_info' => 'Maison partagée - Chambre vue mer',
        ]);
        PriceItem::create([
            'pricing_id' => $class2->id,
            'person' => 2,
            'price' => 200,
            'room_info' => 'Chambre simple privée',
            'house_info' => 'Maison partagée - Chambre vue mer',
        ]);

        $class3 = ClassPricing::create([
            'class_id' => $data3->id,
            'arrive_date' => Carbon::now()->addDay(3),
        ]);
        PriceItem::create([
            'pricing_id' => $class3->id,
            'person' => 1,
            'price' => 100,
            'room_info' => 'Chambre double partagée',
            'house_info' => 'Maison partagée - Chambre vue mer',
        ]);
        PriceItem::create([
            'pricing_id' => $class3->id,
            'person' => 2,
            'price' => 200,
            'room_info' => 'Chambre simple privée',
            'house_info' => 'Maison partagée - Chambre vue mer',
        ]); 
        $class4 = ClassPricing::create([
            'class_id' => $data4->id,
            'arrive_date' => Carbon::now()->addDay(3),
        ]);
        PriceItem::create([
            'pricing_id' => $class4->id,
            'person' => 1,
            'price' => 100,
            'room_info' => 'Chambre double partagée',
            'house_info' => 'Maison partagée - Chambre vue mer',
        ]);
        PriceItem::create([
            'pricing_id' => $class4->id,
            'person' => 2,
            'price' => 200,
            'room_info' => 'Chambre simple privée',
            'house_info' => 'Maison partagée - Chambre vue mer',
        ]); 
        $class5 = ClassPricing::create([
            'class_id' => $data5->id,
            'arrive_date' => Carbon::now()->addDay(3),
        ]);
        PriceItem::create([
            'pricing_id' => $class5->id,
            'person' => 1,
            'price' => 100,
            'room_info' => 'Chambre double partagée',
            'house_info' => 'Maison partagée - Chambre vue mer',
        ]);
        PriceItem::create([
            'pricing_id' => $class5->id,
            'person' => 2,
            'price' => 200,
            'room_info' => 'Chambre simple privée',
            'house_info' => 'Maison partagée - Chambre vue mer',
        ]); 

        for($i = 1; $i<=5; $i++){
            for($j = 1; $j<=5; $j++){
                ImageForClass::create([
                    'class_id' => $i,
                    'image'    => $j.'.jpg'
                ]);
            }
        }
    }
}
