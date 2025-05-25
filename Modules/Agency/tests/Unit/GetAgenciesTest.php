<?php

namespace Modules\Agency\Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\Agency\Actions\GetAgencies;
use Modules\Agency\Models\Agency;
use Modules\Category\Models\Category;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class GetAgenciesTest extends TestCase
{
    use RefreshDatabase;

    #[Test] public function canGetAgencies(): void
    {
        $categories = Category::factory()->count(15)->create();
        Agency::factory()
            ->count(10)
            ->create()
            ->each(fn ($agency) => $agency->syncCategories($categories->random(3)->pluck('id')->toArray()));

        $agencies = GetAgencies::make()->handle();

        $this->assertCount(10, $agencies);
    }
}
