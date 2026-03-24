@extends('layouts.app')

@section('title', 'My Bookings | Villaveh Gameview')
@section('keywords', 'my bookings, reservations, villaveh gameview, nakuru')
@section('description', 'View and manage your upcoming bookings at Villaveh Gameview. Cancel or modify your reservations with ease.')

@section('content')
    <livewire:my-bookings />
@endsection

@push('styles')
    <style>
        /* Optional: custom styling for pagination to match the luxurious theme */
        nav[role="navigation"] .relative {
            @apply inline-flex items-center justify-center rounded-lg border border-stone-300 bg-white px-4 py-2 text-sm font-medium text-stone-700 hover:bg-stone-50;
        }

        nav[role="navigation"] .relative[aria-current="page"] {
            @apply bg-amber-700 border-amber-700 text-white hover:bg-amber-800;
        }
    </style>
@endpush