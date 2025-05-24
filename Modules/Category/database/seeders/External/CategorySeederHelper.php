<?php

namespace Modules\Category\Database\Seeders\External;

use Illuminate\Database\Eloquent\Collection;
use Modules\Category\Models\Category;

class CategorySeederHelper
{
    public static function seedCategories(Collection $entities, int $min = 0, int $max = 5): void
    {
        $categories = Category::pluck('id');

        foreach ($entities as $entity) {
            $toSyncCount = rand($min, $max);
            $toSync = $categories
                ->random($toSyncCount)
                ->toArray();

            $entity->syncCategories($toSync);
        }
    }
}
