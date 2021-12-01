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


                    <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        <div class="col-md-12">
                            <strong>Title</strong>
                            <div class="form-group">
                                <input type="text" name="title" placeholder="Title" class="form-control">

                            </div>
                        </div>

                        <div class="col-md-12">
                            <strong>Description</strong>
                            <div class="form-group">
                                <textarea type="text" rows="5" name="description" placeholder="Description" class="form-control"></textarea>

                            </div>
                        </div>

                        <div class="col-md-12">
                            <strong>Price</strong>
                            <div class="form-group">
                                <input type="text" name="price" placeholder="Price" class="form-control">

                            </div>
                        </div>

                        <div class="col-md-12">
                            <strong>Category</strong>
                            <div class="form-group">
                                <select name="category" id="" class="form-control">
                                    <option value="" selected>Select</option>
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
                                <input type="file" name="image" placeholder="upload" class="form-control"></input>

                            </div>
                        </div>

                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-sm0 btn-secondary" name="Search">Submit</button>

                            <a class="btn btn-sm0 btn-danger" href="{{route('product.index')}}" title="">Cancel </a>

                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
</div>


@endsection