<?php

namespace Modules\Category\Tests\Unit\Resources;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Category\Traits\HasCategories;

class ModelForTestHasCategories extends Model
{
    use HasCategories;

    protected $guarded = ['id'];
    public static function booted()
    {
        Schema::dropIfExists('model_for_test_categories_category');
        Schema::create('model_for_test_categories_category', function (Blueprint $table) {
            $table->id();
            $table->foreignId('model_for_test_has_categories_id');
            $table->foreignId('category_id');
            $table->timestamps();
        });

        Schema::dropIfExists('model_for_test_has_categories');
        Schema::create('model_for_test_has_categories', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
    }

    public function getHasCategoriesTable(): string
    {
        return 'model_for_test_categories_category';
    }
}
