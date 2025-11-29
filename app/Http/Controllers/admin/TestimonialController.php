<?php

namespace App\Http\Controllers\Admin;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TestimonialController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
         $pending = Testimonial::where('approved', false)->get();
        $approved = Testimonial::where('approved', true)->get();

        return view('admin.testimonials.index', compact('pending', 'approved'));
    }
}
