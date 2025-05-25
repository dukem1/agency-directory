<?php

namespace Modules\Agency\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Agency\Database\Factories\AgencyFactory;
use Modules\Category\Traits\HasCategories;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Agency extends Model
{
    use HasFactory;
    use HasCategories;
    use HasSlug;

    protected $guarded = ['id'];

    protected static function newFactory(): AgencyFactory
    {
        return AgencyFactory::new();
    }

    protected function getHasCategoriesTable(): string
    {
        return 'agency_category';
    }

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug')
            ->slugsShouldBeNoLongerThan(50);
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
