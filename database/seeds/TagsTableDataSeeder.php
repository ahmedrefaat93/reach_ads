<?php

use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagsTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Tag::class,20)->create();
    }
}
