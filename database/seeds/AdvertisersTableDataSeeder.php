<?php

use Illuminate\Database\Seeder;
use App\Models\Advertiser;
class AdvertisersTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       factory(Advertiser::class,20)->create();
    }
}
