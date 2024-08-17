<?php

namespace Tests\Feature;

use App\Models\Trip\TripList;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class TripManagementTest extends TestCase
{
    // use RefreshDatabase;

    protected function authenticate()
    {
        $response = $this->post('/api/v1/login', [
            'email' => "sidik@gmail.com",
            'password' => 'okokok71',
        ]);
        
        $token = $response->json('token');
        $userId = $response->json('id');

        return [
            'token'=>$token,
            'user_id'=>$userId
        ];
    }

    public function test_trip_creation()
    {
        $auth = $this->authenticate();
        $response = $this->postJson('/api/v1/trip-list-create', [
            'user_id' => 11,
            'title' => 'New Trip',
            'origin' => 'Bandung',
            'destination' => 'Malang',
            'start_date' => '2028-08-09',
            'end_date' => '2028-08-19',
            'status' => 'single day',
            'description' => 'Lorem Ipsum'
        ], ['Authorization' => 'Bearer ' . $auth['token']]);

        $response->assertStatus(201)
        ->assertJson([
            'status' => true,
            'message' => 'Your trip created',
            'data' => [
                'user_id' => 11,
                'title' => 'New Trip',
                'origin' => 'Bandung',
                'destination' => 'Malang',
                'status' => 'single day',
                'description' => 'Lorem Ipsum',
                'schedule' => '09 August 2028 - 19 August 2028'
            ]
        ]);
    }

    public function test_trip_retrieval()
    {
        $auth = $this->authenticate();  
        $trip = TripList::where('user_id', $auth['user_id'])->first();

        $response = $this->getJson('/api/v1/trip-list-detail/' . $trip->id, [
            'Authorization' => 'Bearer ' . $auth['token']
        ]);

        $response->assertStatus(200)
        ->assertJson([
            'status' => true,
            'message' => 'Your trip detail',
            'data' => [
                'user_id' => $trip->user_id,
                'title' => $trip->title,
                'origin' => $trip->origin,
                'destination' => $trip->destination,
                'status' => $trip->status,
                'description' => $trip->description,
                'schedule' => date("d F Y", strtotime($trip->start_date)) . ' - '. date("d F Y", strtotime($trip->end_date))
            ]
        ]);
    }

    public function test_trip_update()
    {
        $auth = $this->authenticate();
        $trip = TripList::where('user_id', $auth['user_id'])->first();
        
        $response = $this->putJson('/api/v1/trip-list-update/' . $trip->id, [
            'title' => 'Update Trip',
            'origin' => 'Bandung',
            'destination' => 'Malang',
            'start_date' => '2028-08-09',
            'end_date' => '2028-08-19',
            'status' => 'single day',
            'description' => 'Lorem Ipsum'
        ], ['Authorization' => 'Bearer ' . $auth['token']]);

        $response->assertStatus(200)
        ->assertJson([
            'status' => true,
            'message' => 'Your trip updated',
            'data' => [
                'user_id' => $trip->user_id,
                'title' => $trip->title,
                'origin' => $trip->origin,
                'destination' => $trip->destination,
                'status' => $trip->status,
                'description' => $trip->description,
                'schedule' => date("d F Y", strtotime($trip->start_date)) . ' - '. date("d F Y", strtotime($trip->end_date))
            ]
        ]);
    }
    

    public function test_trip_deletion()
    {
        $auth = $this->authenticate();
        $trip = TripList::where('user_id', $auth['user_id'])->first();

        $response = $this->deleteJson('/api/v1/trip-list-delete/' . $trip->id, [], [
            'Authorization' => 'Bearer ' . $auth['token'],
        ]);

        $response->assertStatus(204);

        $this->assertDatabaseMissing('trip_list', [
            'id' => $trip->id,
        ]);
    }
}   
