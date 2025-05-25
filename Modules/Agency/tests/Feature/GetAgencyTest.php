<?php

namespace Modules\Agency\Tests\Feature;

use Modules\Agency\Models\Agency;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class GetAgencyTest extends TestCase
{
    #[Test] public function canGetAgencies(): void
    {
        $agency = Agency::factory()->create();

        $response = $this->get('/agencies/'.$agency->slug);

        $response->assertStatus(200);
    }
}
