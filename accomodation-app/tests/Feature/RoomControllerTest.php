<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Room;

class RoomControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_displays_rooms()
    {
        Room::factory()->create(['name' => 'Deluxe', 'type' => 'Suite', 'image' => 'http://example.com/img.jpg', 'description' => 'Luxurious suite', 'price' => 200]);
        $response = $this->get(route('rooms.index'));
        $response->assertStatus(200);
        $response->assertSee('Deluxe');
    }

    public function test_create_room()
    {
        $data = [
            'name' => 'Deluxe',
            'type' => 'Suite',
            'image' => 'http://example.com/img.jpg',
            'description' => 'Luxurious suite',
            'price' => 200,
        ];
        $response = $this->post(route('rooms.store'), $data);
        $response->assertRedirect(route('rooms.index'));
        $this->assertDatabaseHas('rooms', $data);
    }

    public function test_show_room()
    {
        $room = Room::factory()->create(['name' => 'Deluxe', 'type' => 'Suite', 'image' => 'http://example.com/img.jpg', 'description' => 'Luxurious suite', 'price' => 200]);
        $response = $this->get(route('rooms.show', $room->id));
        $response->assertStatus(200);
        $response->assertSee('Deluxe');
    }

    public function test_update_room()
    {
        $room = Room::factory()->create(['name' => 'Deluxe', 'type' => 'Suite', 'image' => 'http://example.com/img.jpg', 'description' => 'Luxurious suite', 'price' => 200]);
        $update = [
            'name' => 'Premium',
            'type' => 'Suite',
            'image' => 'http://example.com/img2.jpg',
            'description' => 'Updated suite',
            'price' => 250,
        ];
        $response = $this->put(route('rooms.update', $room->id), $update);
        $response->assertRedirect(route('rooms.index'));
        $this->assertDatabaseHas('rooms', $update);
    }

    public function test_delete_room()
    {
        $room = Room::factory()->create(['name' => 'Deluxe', 'type' => 'Suite', 'image' => 'http://example.com/img.jpg', 'description' => 'Luxurious suite', 'price' => 200]);
        $response = $this->delete(route('rooms.destroy', $room->id));
        $response->assertRedirect(route('rooms.index'));
        $this->assertDatabaseMissing('rooms', ['id' => $room->id]);
    }
}
