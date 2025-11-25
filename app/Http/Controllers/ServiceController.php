<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function __invoke(Request $request)
    {
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

        // Store image
        $path = $request->file('image')->store('services', 'public');

        Service::create([
            'image' => $path,
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.services.index')->with('success', 'Service created successfully.');
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
        return view('admin.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpg,png,jpeg,webp|max:2048',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $data = [
            'name' => $request->name,
            'description' => $request->description,
        ];

        // If new image is uploaded
        if ($request->hasFile('image')) {
            // Delete old image
            Storage::disk('public')->delete($service->image);

            // Save new image
            $data['image'] = $request->file('image')->store('services', 'public');
        }

        $service->update($data);

        return redirect()->route('admin.services.index')->with('success', 'Service updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        Storage::disk('public')->delete($service->image);
        $service->delete();

        return back()->with('success', 'Service deleted.');
    }
}
