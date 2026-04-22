<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::orderBy('display_order')->paginate(10);
        return view('Admin.rooms.index', compact('rooms'));
    }

    public function create()
    {
        return view('Admin.rooms.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
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
            'display_order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        // Process amenities (convert comma-separated to array)
        $amenitiesArray = $request->amenities 
            ? array_map('trim', explode(',', $request->amenities)) 
            : [];

        // Process multiple images
        $imagePaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('rooms', 'public_direct');
                $imagePaths[] = $path;
            }
        }

        $room = Room::create([
            'name' => $validated['name'],
            'type' => $validated['type'] ?? null,
            'description' => $validated['description'],
            'price' => $validated['price'],
            'category' => $validated['category'] ?? null,
            'size' => $validated['size'] ?? null,
            'capacity' => $validated['capacity'] ?? null,
            'bed_type' => $validated['bed_type'] ?? null,
            'badge' => $validated['badge'] ?? null,
            'best_season' => $validated['best_season'] ?? null,
            'amenities' => $amenitiesArray,
            'images' => $imagePaths,
            'is_popular' => $request->boolean('is_popular'),
            'is_featured' => $request->boolean('is_featured'),
            'display_order' => $validated['display_order'] ?? 0,
            'is_active' => $request->boolean('is_active', true),
        ]);

        return redirect()->route('rooms.index')
            ->with('success', 'Room created successfully.');
    }

    public function edit(Room $room)
    {
        // Convert amenities array to comma-separated string for form
        $room->amenities_string = is_array($room->amenities) 
            ? implode(', ', $room->amenities) 
            : $room->amenities;
        
        return view('Admin.rooms.update', compact('room'));
    }

    public function update(Request $request, Room $room)
    {
        $validated = $request->validate([
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
            'existing_images' => 'array', // keep track of which existing images to retain
            'is_popular' => 'boolean',
            'is_featured' => 'boolean',
            'display_order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        // Process amenities
        $amenitiesArray = $request->amenities 
            ? array_map('trim', explode(',', $request->amenities)) 
            : [];

        // Handle existing images removal
        $existingImages = $room->images ?? [];
        if ($request->has('existing_images')) {
            // Keep only the images that are still checked
            $existingImages = array_intersect($existingImages, $request->existing_images);
        } else {
            $existingImages = []; // if none selected, remove all
        }

        // Upload new images
        $newImagePaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('rooms', 'public_direct');
                $newImagePaths[] = $path;
            }
        }

        // Merge kept existing images with new ones
        $allImages = array_merge($existingImages, $newImagePaths);

        // Delete removed images from storage
        $removedImages = array_diff($room->images ?? [], $existingImages);
        foreach ($removedImages as $removedImage) {
            Storage::disk('public_direct')->delete($removedImage);
        }

        $room->update([
            'name' => $validated['name'],
            'type' => $validated['type'] ?? null,
            'description' => $validated['description'],
            'price' => $validated['price'],
            'category' => $validated['category'] ?? null,
            'size' => $validated['size'] ?? null,
            'capacity' => $validated['capacity'] ?? null,
            'bed_type' => $validated['bed_type'] ?? null,
            'badge' => $validated['badge'] ?? null,
            'best_season' => $validated['best_season'] ?? null,
            'amenities' => $amenitiesArray,
            'images' => $allImages,
            'is_popular' => $request->boolean('is_popular'),
            'is_featured' => $request->boolean('is_featured'),
            'display_order' => $validated['display_order'] ?? 0,
            'is_active' => $request->boolean('is_active', true),
        ]);

        return redirect()->route('rooms.index')
            ->with('success', 'Room updated successfully.');
    }

    public function destroy(Room $room)
    {
        // Delete associated images
        if ($room->images) {
            foreach ($room->images as $image) {
                Storage::disk('public_direct')->delete($image);
            }
        }
        $room->delete();

        return redirect()->route('admin.rooms.index')
            ->with('success', 'Room deleted successfully.');
    }
}