@extends('layouts.dashboard')
@section('content')
    <h1 class="text-decoration-underline">{{ $item->item_name }}</h1>
    <div class="row">
        <div class="col-4">
            <img src="/assets/img/veges-icon.png" class="w-100 img-fluid">
        </div>
        <div class="col-8">
            <h3 class="mt-5">Price: Rp. {{ number_format($item->price) }},-</h3>
            <p>{{ $item->item_desc }}</p>
        </div>
        <div class="col-12 text-end" style="margin-bottom: 200px;">
            <a href="/cart/buy/{{ $item->id }}" class="btn btn-warning"><h1>Buy</h1></a>
        </div>
    </div>
@endsection