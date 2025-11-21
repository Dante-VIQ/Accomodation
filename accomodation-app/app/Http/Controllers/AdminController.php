<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class AdminController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        //
    }

    public function index() {
        return view('Admin.index', [
            'rooms' => Room::latest()->paginate(10)
        ]);
    }
}
