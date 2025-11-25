<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

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
              'image' => 'required|url',
              'description' => 'required|string',
              'price' => 'required|numeric',
           ]);
           Room::create($validated);
           return redirect()->route('admin.rooms.index')->with('success', 'Room created successfully.');
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
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'image' => 'required|url',
            'description' => 'required|string',
            'price' => 'required|numeric',
        ]);
        $room = Room::findOrFail($id);
        $room->update($validated);
        return redirect()->route('admin.rooms.index')->with('success', 'Room updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $room = Room::findOrFail($id);
        $room->delete();
        return redirect()->route('admin.rooms.index')->with('success', 'Room deleted successfully.');
    }
}
