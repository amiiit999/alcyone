@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-info text-light rounded-0"><b>{{ __('Add New Product') }}</b>

                    <a class="btn btn-sm btn-danger float-right" href="{{route('product.index')}}"> Back</a>
                </div>

                <div class="card-body text-left">


                    <form action="{{route('product.update',$product->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="col-md-12">
                            <strong>Title</strong>
                            <div class="form-group">
                                <input type="text" name="title" placeholder="Title" class="form-control" value="{{$product->title}}">

                            </div>
                        </div>

                        <div class="col-md-12">
                            <strong>Description</strong>
                            <div class="form-group">
                                <textarea type="text" name="description" placeholder="Description" class="form-control" rows="7">{{$product->description}}</textarea>

                            </div>
                        </div>

                        <div class="col-md-12">
                            <strong>Price</strong>
                            <div class="form-group">
                                <input type="text" name="price" placeholder="Price" class="form-control" value="{{$product->price}}">

                            </div>
                        </div>

                        <div class="col-md-12">
                            <strong>Category</strong>
                            <div class="form-group">
                                <select name="category" id="" class="form-control">

                                    @if($category)

                                    @foreach($category as $row)
                                    <option value="{{$row->id}}">{{$row->name}}</option>
                                    @endforeach
                                    @endif
                                </select>

                            </div>
                        </div>

                        <div class="col-md-12">
                            <strong>Image</strong>
                            <div class="form-group">
                                @if ($product->image)
                                <img src="{{ url('') }}/images/{{$product->image}}" height="80">
                                @else
                                <p>No image found</p>
                                @endif

                                <input type="file" name="image" class="form-control" value="{{$product->image}}" />

                            </div>
                        </div>

                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-sm0 btn-secondary" name="Search">Update</button>

                            <a class="btn btn-sm0 btn-danger" href="{{route('product.index')}}" title="">Cancel </a>

                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
</div>


@endsection