<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdvertisersTableDataSeeder::class);
        $this->call(TagsTableDataSeeder::class);
        $this->call(CategoriesTableDataSeeder::class);
        $this->call(AdsTableDataSeeder::class);
        $this->call(AdTagTableDataSeeder::class);

    }
}
