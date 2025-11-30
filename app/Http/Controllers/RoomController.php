<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;

class RoomController extends Controller
{
    public function __construct()
    {
        // Only master, admin, engineer allowed
        $this->middleware('role:engineer|master');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = Room::latest()->paginate(10);
        return view('Admin.rooms', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.rooms.create');
    }

    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'type' => 'required|string|max:255',
        'image' => 'required|image|mimes:jpg,png,jpeg|max:2048',
        'description' => 'required|string',
        'price' => 'required|numeric',
    ]);

    Log::info('Store method called', $validated); // Debug line

    try {
        // Upload image
        $path = $request->file('image')->store('rooms', 'public_direct');
        Log::info('Image uploaded to: ' . $path); // Debug line

        $imagePath = 'uploads/' . $path;

        // Create room
        $room = Room::create([
            'name' => $validated['name'],
            'type' => $validated['type'],
            'image' => $imagePath,
            'description' => $validated['description'],
            'price' => $validated['price'],
        ]);

        Log::info('Room created with ID: ' . $room->id); // Debug line

        return redirect()->route('rooms.index')->with('success', 'Room created successfully.');

    } catch (\Exception $e) {
        Log::error('Error creating room: ' . $e->getMessage()); // Debug line
        return back()->with('error', 'Error creating room: ' . $e->getMessage());
    }
}
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $room = Room::findOrFail($id);
        return view('Admin.rooms.show', compact('room'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $room = Room::findOrFail($id);
        return view('Admin.rooms.update', compact('room'));
    }

    /**
     * Update the specified resource in storage.
     */
public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'type' => 'required|string|max:255',
        'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048', // Make image optional for update
        'description' => 'required|string',
        'price' => 'required|numeric',
    ]);

    $room = Room::findOrFail($id);
    $updateData = [
        'name' => $request->name,
        'type' => $request->type,
        'description' => $request->description,
        'price' => $request->price,
    ];

    // Handle image upload only if new image is provided
    if ($request->hasFile('image')) {
        $path = $request->file('image')->store('rooms', 'public_direct');
        $updateData['image'] = 'uploads/' . $path;
    }

    $room->update($updateData);
    return redirect()->route('rooms.index')->with('success', 'Room updated successfully.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $room = Room::findOrFail($id);
        $room->delete();
        return redirect()->route('rooms.index')->with('success', 'Room deleted successfully.');
    }
}
