<?php

namespace Modules\Agency\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Agency\Models\Agency;
use Modules\Category\Database\Seeders\External\CategorySeederHelper;

class AgencyCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $agencies = Agency::get('id');

        CategorySeederHelper::seedCategories($agencies);
    }
}
