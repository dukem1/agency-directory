<?php

namespace Modules\Agency\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Agency\Database\Factories\AgencyFactory;

class Agency extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

     protected static function newFactory(): AgencyFactory
     {
          return AgencyFactory::new();
     }
}
