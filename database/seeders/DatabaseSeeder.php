<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Products\Database\Seeders\ProductsDatabaseSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(LanguagesSeeder::class);
        $this->call(ProductsDatabaseSeeder::class);
    }
}
