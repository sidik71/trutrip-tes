<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;


class TripManagementTest extends TestCase
{
    use RefreshDatabase;
    
    /** @test */
    public function it_can_create_a_trip()
    {
        $user = User::factory()->create();

        $this->actingAs($user)
        ->post('/api/v1/trip-list-create', [
            'user_id' => 11,
            'title' => 'New Trip',
            'origin' => 'Bandung',
            'destination' => 'Malang',
            'start_date' => '2028-08-09',
            'end_date' => '2028-08-19',
            'status' => 'single day',
            'description' => 'Lorem Ipsum'
        ])
        ->assertStatus(201)
        ->assertJson([
            'user_id' => 11,
            'title' => 'New Trip',
            'origin' => 'Bandung',
            'destination' => 'Malang',
            'start_date' => '2028-08-09',
            'end_date' => '2028-08-19',
            'status' => 'single day',
            'description' => 'Lorem Ipsum'
        ]);
        // $response = $this->post('/api/v1/trip-list-create', [
        //     'user_id' => 11,
        //     'title' => 'New Trip',
        //     'origin' => 'Bandung',
        //     'destination' => 'Malang',
        //     'start_date' => '2028-08-09',
        //     'end_date' => '2028-08-19',
        //     'status' => 'single day',
        //     'description' => 'Lorem Ipsum'
        // ]);

        // $response->assertStatus(201)
        //          ->assertJson([
        //             'user_id' => 11,
        //             'title' => 'New Trip',
        //             'origin' => 'Bandung',
        //             'destination' => 'Malang',
        //             'start_date' => '2028-08-09',
        //             'end_date' => '2028-08-19',
        //             'status' => 'single day',
        //             'description' => 'Lorem Ipsum'
        //          ]);

        // $this->assertDatabaseHas('trip_list', [
        //     'title' => 'New Trip',
        // ]);
    }
}
