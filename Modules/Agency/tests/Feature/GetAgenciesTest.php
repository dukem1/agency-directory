<?php

namespace Modules\Agency\Tests\Feature;

use Modules\Agency\Models\Agency;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class GetAgenciesTest extends TestCase
{
    #[Test] public function canGetAgencies(): void
    {
        Agency::factory()->count(5)->create();

        $response = $this->get('/agencies');

        $response->assertStatus(200);
    }
}
