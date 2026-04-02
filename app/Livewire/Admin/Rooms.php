<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Room;
use Illuminate\Support\Facades\Storage;


class Rooms extends Component
{
    use WithPagination, WithFileUploads;

    public $showForm = false;
    public $editingId = null;
    public $name, $type, $description, $price, $category, $size, $capacity, $bed_type, $badge, $best_season, $amenities, $images, $is_popular, $is_featured, $display_order, $is_active;
    public $tempImages = [];
    public $existingImages = [];

    protected $rules = [
        'name' => 'required|string|max:255',
        'type' => 'nullable|string',
        'description' => 'required|string',
        'price' => 'required|numeric|min:0',
        'category' => 'nullable|string',
        'size' => 'nullable|string',
        'capacity' => 'nullable|integer',
        'bed_type' => 'nullable|string',
        'badge' => 'nullable|string',
        'best_season' => 'nullable|string',
        'amenities' => 'nullable|string',
        'images.*' => 'image|max:2048',
        'is_popular' => 'boolean',
        'is_featured' => 'boolean',
        'display_order' => 'integer',
        'is_active' => 'boolean',
    ];

    public function openForm()
    {
        $this->resetForm();
        $this->showForm = true;
    }

    public function edit($id)
    {
        $room = Room::findOrFail($id);
        $this->editingId = $room->id;
        $this->name = $room->name;
        $this->type = $room->type;
        $this->description = $room->description;
        $this->price = $room->price;
        $this->category = $room->category;
        $this->size = $room->size;
        $this->capacity = $room->capacity;
        $this->bed_type = $room->bed_type;
        $this->badge = $room->badge;
        $this->best_season = $room->best_season;
        $this->amenities = is_array($room->amenities) ? implode(',', $room->amenities) : $room->amenities;
        $this->is_popular = (bool)$room->is_popular;
        $this->is_featured = (bool)$room->is_featured;
        $this->display_order = $room->display_order;
        $this->is_active = (bool)$room->is_active;
        $this->existingImages = $room->images ?? [];
        $this->showForm = true;
    }

public function save()
{
    $this->validate();

    // Convert empty strings to null for integer fields (only those that exist in the rooms table)
    $integerFields = ['price', 'capacity', 'display_order'];
    foreach ($integerFields as $field) {
        if ($this->$field === '' || $this->$field === null) {
            $this->$field = null;
        }
    }

    // Process amenities
    $amenitiesArray = $this->amenities ? array_map('trim', explode(',', $this->amenities)) : [];

    // Process images
    $imagePaths = $this->existingImages;
    if ($this->tempImages) {
        foreach ($this->tempImages as $image) {
            $path = $image->store('rooms', 'public');
            $imagePaths[] = $path;
        }
    }

    $data = [
        'name' => $this->name,
        'type' => $this->type,
        'description' => $this->description,
        'price' => $this->price,
        'category' => $this->category,
        'size' => $this->size,
        'capacity' => $this->capacity,
        'bed_type' => $this->bed_type,
        'badge' => $this->badge,
        'best_season' => $this->best_season,
        'amenities' => $amenitiesArray,
        'images' => $imagePaths,
        'is_popular' => $this->is_popular,
        'is_featured' => $this->is_featured,
        'display_order' => $this->display_order ?? 0,
        'is_active' => $this->is_active,
    ];

    if ($this->editingId) {
        $room = Room::findOrFail($this->editingId);
        $room->update($data);
        session()->flash('message', 'Room updated successfully.');
    } else {
        Room::create($data);
        session()->flash('message', 'Room created successfully.');
    }

    $this->cancel();
    $this->dispatch('refreshRooms');
}

    public function delete($id)
    {
        $room = Room::findOrFail($id);
        // Delete images from storage
        if ($room->images) {
            foreach ($room->images as $image) {
                Storage::disk('public_direct')->delete($image);
            }
        }
        $room->delete();
        session()->flash('message', 'Room deleted.');
    }

    public function cancel()
    {
        $this->resetForm();
        $this->showForm = false;
    }

    public function removeExistingImage($index)
    {
        $path = $this->existingImages[$index];
        Storage::disk('public_direct')->delete($path);
        unset($this->existingImages[$index]);
        $this->existingImages = array_values($this->existingImages);
    }

    public function resetForm()
    {
        $this->editingId = null;
        $this->name = '';
        $this->type = '';
        $this->description = '';
        $this->price = '';
        $this->category = '';
        $this->size = '';
        $this->capacity = '';
        $this->bed_type = '';
        $this->badge = '';
        $this->best_season = '';
        $this->amenities = '';
        $this->is_popular = false;
        $this->is_featured = false;
        $this->display_order = 0;
        $this->is_active = true;
        $this->tempImages = [];
        $this->existingImages = [];
    }

    public function render()
    {
        $rooms = Room::orderBy('display_order')->paginate(10);
        return view('livewire.admin.rooms', compact('rooms'))->layout('layouts.admin');
    }
}