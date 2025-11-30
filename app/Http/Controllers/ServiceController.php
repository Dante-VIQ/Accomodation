<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
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
        $services = Service::latest()->paginate(10);
        return view('Admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,webp|max:2048',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // Store image using public_direct disk
        $path = $request->file('image')->store('services', 'public_direct');
        $imagePath = 'uploads/' . $path;

        Service::create([
            'image' => $imagePath,
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('services.index')->with('success', 'Service created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $service = Service::findOrFail($id); // Fixed: added this line
        return view('admin.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) // Changed to accept ID
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpg,png,jpeg,webp|max:2048',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $service = Service::findOrFail($id); // Find the service
        $data = [
            'name' => $request->name,
            'description' => $request->description,
        ];

        // If new image is uploaded
        if ($request->hasFile('image')) {
            // Delete old image from public folder
            if ($service->image && file_exists(public_path($service->image))) {
                unlink(public_path($service->image));
            }

            // Save new image using public_direct
            $path = $request->file('image')->store('services', 'public_direct');
            $data['image'] = 'uploads/' . $path;
        }

        $service->update($data);

        return redirect()->route('services.index')->with('success', 'Service updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) // Changed to accept ID
    {
        $service = Service::findOrFail($id);

        // Delete image from public folder
        if ($service->image && file_exists(public_path($service->image))) {
            unlink(public_path($service->image));
        }

        $service->delete();

        return back()->with('success', 'Service deleted.');
    }
}
