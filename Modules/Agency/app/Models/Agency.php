<?php

namespace Modules\Agency\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Agency\Database\Factories\AgencyFactory;
use Modules\Category\Traits\HasCategories;

class Agency extends Model
{
    use HasFactory;
    use HasCategories;

    protected $guarded = ['id'];

    protected static function newFactory(): AgencyFactory
    {
        return AgencyFactory::new();
    }

    protected function getHasCategoriesTable(): string
    {
        return 'agency_category';
    }
}
