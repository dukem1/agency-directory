<?php

namespace Modules\Agency\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Agency\Database\Factories\AgencyFactory;
use Modules\Agency\ModelFilters\AgencyFilter;
use Modules\Category\Traits\HasCategories;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Agency extends Model
{
    use HasFactory;
    use HasCategories;
    use HasSlug;
    use Filterable;

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

    public function modelFilter(): ?string
    {
        return $this->provideFilter(AgencyFilter::class);
    }
}
