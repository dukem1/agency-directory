<?php

namespace Modules\Agency\Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\Agency\Actions\GetAgencies;
use Modules\Agency\Models\Agency;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class GetAgenciesTest extends TestCase
{
    use RefreshDatabase;

    #[Test] public function canGetAgencies(): void
    {
        Agency::factory()->count(20)->create();

        $agencies = GetAgencies::make()->handle();

        $this->assertCount(20, $agencies);
    }
}
