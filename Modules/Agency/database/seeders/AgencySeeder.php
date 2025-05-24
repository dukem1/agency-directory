<?php

namespace Modules\Agency\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Agency\Models\Agency;

class AgencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Agency::factory()
            ->count(20)
            ->create();
    }
}
