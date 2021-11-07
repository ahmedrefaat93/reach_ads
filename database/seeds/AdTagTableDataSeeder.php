<?php

use Illuminate\Database\Seeder;
use App\Models\Tag;
use App\Models\Ad;
class AdTagTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Get all the tags attaching up to 10 random tag to each ad
        $tags = Tag::all();
        Ad::all()->each(function ($ad) use ($tags) {
            $ad->tags()->attach(
                $tags->random(rand(1, 10))->pluck('id')->toArray()
            );
        });

    }
}
