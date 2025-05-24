<?php

namespace Modules\Category\Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\Category\Models\Category;
use Modules\Category\Tests\Unit\Resources\ModelForTestHasCategories;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class HasCategoriesTest extends TestCase
{
    use RefreshDatabase;

    #[Test] public function canAddCategory(): void
    {
        $model = ModelForTestHasCategories::create();
        $category = Category::factory()->create();

        $this->assertDatabaseMissing($model->getHasCategoriesTable(), [
            'category_id' => $category->id,
        ]);

        $model->syncCategories([$category->id]);

        $this->assertDatabaseHas($model->getHasCategoriesTable(), [
            'category_id' => $category->id,
            'model_for_test_has_categories_id' => $model->id,
        ]);
    }
}
