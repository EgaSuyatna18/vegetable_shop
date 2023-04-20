@extends('layouts.dashboard')
@section('content')
    <div class="container-fluid" style="min-height: 800px;">
        @if (session()->has('cart'))
        <h1 class="text-decoration-underline">Cart</h1>
            @php $total = 0; @endphp
            @foreach (session()->get('cart') as $item)
            @php $total += $item->price; @endphp
            <div class="d-flex justify-content-evenly">
                <img src="/assets/img/veges-icon.png" class="img-fluid" style="width: 100px;">
                <h3 class="d-inline">{{ $item->item_name }}</h3>    
                <h3 class="d-inline">Rp. {{ number_format($item->price) }},-</h3>    
                <a href="/cart/delete/{{ array_search($item, session()->get('cart')) }}"><h3>Delete</h3></a>
            </div>    
            @endforeach
            <div class="text-end">
                <h3 class="d-inline me-4">Total: Rp. {{ number_format($total) }},-</h3>
                <a href="/check_out" class="btn btn-warning">Check Out</a>
            </div>
        @else
            <div class="text-center">
                <h1>Belum Ada Data!</h1>
            </div>
        @endif
    </div>
@endsection