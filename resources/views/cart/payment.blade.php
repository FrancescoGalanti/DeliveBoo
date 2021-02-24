@extends('layouts.braintree')

@section('content')

<div class="container">

    <h2>ordine numero:{{ $order->id }}</h2>

        
    <form action="{{ route('guest.update', $order->id) }}" method="POST"  enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="form-group">
            <label for="name">Insert your name</label>
            <input  class="form-control" type="text" name="name" id="name" value="{{ old('name', $order->name) }}">
        </div>
        <div class="form-group">
            <label for="address">Insert your address</label>
            <input  class="form-control" type="text" name="address" id="address" value="{{ old('address', $order->address) }}">
        </div>
        <div class="form-group">
            <label for="email">Insert your email</label>
            <input  class="form-control" type="text" name="email" id="email" value="{{ old('email', $order->email) }}">
        </div>
        <div class="form-group">
            <label for="phone">Insert your phone number</label>
            <input  class="form-control" type="text" name="phone" id="phone" value="{{ old('phone', $order->phone) }}">
        </div>

        <div class="form-group">
            <label for="text">More info about delivery:</label>
            <textarea class="form-control" name="text" id="text" cols="30" rows="5">{{ old('text', $order->text) }}</textarea>
        </div>
        
        
        <input type="submit" class="btn btn-primary" value="Conferma i dati">
        
    </form>


    <form id="payment-form" action="{{ route('guest.payment', $order->id) }}" method="post">
        @csrf
        <div id="dropin-container"></div>
        <input type="hidden" id="nonce" name="payment_method_nonce"/>
        <input type="submit" />
    </form>
</div>

@endsection
      
