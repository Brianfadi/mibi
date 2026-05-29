<?php

namespace Tests\Feature;

use App\Models\Registration;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_can_submit_registration_form(): void
    {
        $data = [
            'full_name' => 'Jane Doe',
            'age' => 28,
            'gender' => 'female',
            'country' => 'Kenya',
            'city' => 'Nairobi',
            'phone' => '+254712345678',
            'email' => 'jane@example.com',
            'relationship_status' => 'single',
            'challenge_type' => 'heartbreak',
            'challenge_explanation' => 'Going through a tough breakup',
            'willing_to_participate' => 'Yes',
            'terms_accepted' => '1',
        ];

        $response = $this->post(route('register.submit'), $data);

        $response->assertRedirect(route('register.thanks'));

        $this->assertDatabaseHas('registrations', [
            'email' => 'jane@example.com',
            'full_name' => 'Jane Doe',
            'willing_to_participate' => 'Yes',
        ]);

        $this->assertDatabaseHas('users', [
            'email' => 'jane@example.com',
            'name' => 'Jane Doe',
        ]);
    }
}
