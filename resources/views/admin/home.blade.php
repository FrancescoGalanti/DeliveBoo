@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>dashboard</h1>

        <a href="{{ route('admin.restaurants.index') }}">visalizza tutti i piatti</a>
        <a href="{{ route('admin.orders') }}">visalizza tutti gli ordini</a>

        {{-- post if I have images --}}
        @if (!empty($user->path_image))
 
            <img width="500px" src="{{ asset('storage/' . $user->path_image) }}" alt="{{ $user->name }}">
        @else

        {{-- <img src="{{asset('no-img/no-image.png' )}}"> --}}
        <p>no image</p>

        @endif

    </div>

@endsection
