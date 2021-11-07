<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(Category::class,20)->create();

    }
}
