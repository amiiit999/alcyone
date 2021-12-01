@extends('layouts.app')
@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-3 border text-center">
        <img src="{{ url('') }}/images/{{$product->image ? $product->image : 'dafault.png'}}" class="image-fluid" width="130" height="250">
        </div>

        <div class="col-md-6 border p-3">
        <h4 style="font-weight: 200; color:#000;"> {{$product->title ? $product->title : 'Not Available'}}</h4>
        <h5 style="font-weight: 400; color:#000;">price : ₹ {{$product->price ? $product->price : 'Not Available'}}</h5>
        <p style="font-weight: 400; color:#000;" class="mt-3">Category Type :  {{$product->category->name ? $product->category->name : 'Not Available'}}</p>
        <h5 class="mt-3" style="font-weight: 400; color:#000;">Description :</h5>
        <p class="text-secondary" style="font-weight: 300;">{{$product->description ? $product->description : 'Not Available'}}</p>
        </div>
    </div>
</div>
@endsection