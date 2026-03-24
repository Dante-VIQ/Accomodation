{{-- resources/views/services/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Luxury Services & Experiences | Villaveh Gameview Nakuru')
@section('keywords', 'luxury services Nakuru, BnB experiences, safari packages, spa services, private dining, game drives Kenya')
@section('description', 'Discover unparalleled luxury services at Villaveh Gameview. From private safari experiences to spa wellness, gourmet dining, and bespoke concierge services tailored for your perfect stay in Nakuru.')

@section('content')
{{-- @include('partials.our-services') --}}
<livewire:service-card />
@endsection