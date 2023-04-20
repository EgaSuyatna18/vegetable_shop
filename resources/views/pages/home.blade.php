@extends('layouts.dashboard')
@section('content')
    <div class="row justify-content-evenly">
        @foreach ($items as $item)
            <div class="card col-2 my-3" style="width: 18rem;">
                <img src="/assets/img/veges-icon.png" class="card-img-top">
                <div class="card-body text-center">
                <h5 class="card-title">{{ $item->item_name }}</h5>
                <a href="/item/detail/{{ $item->id }}" class="btn btn-primary">Detail</a>
                </div>
            </div>
        @endforeach
    </div>
    {{ $items->links('pagination::bootstrap-5') }}
    @endsection