<?php

namespace Tests\Feature\Users\Endpoints\Auth;

use App\Users\Domain\Models\Dentist;
use Tests\TestCase;

class LogoutUserTest extends TestCase
{
    /** @test */
    public function it_logsout_user_successfully()
    {
        $user = factory(Dentist::class)->create();
        $this->jsonAs($user, 'POST', '/api/logout')->assertStatus(200);
    }
}
