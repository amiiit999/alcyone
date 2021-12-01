@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-info text-light"><b>{{ __('Update Category') }}</b>

                    <a class="btn btn-sm btn-danger float-right" href="{{route('category.index')}}"> Back</a>
                </div>

                <div class="card-body text-left">


                    <form action="{{route('category.update',$category->id)}}" method="POST" >
                        @csrf
                        @method('PUT')
                        <div class="col-md-12">
                            <strong>Name</strong>
                            <div class="form-group">
                                <input type="text" name="name" placeholder="Name" class="form-control" value="{{$category->name}}">

                            </div>
                        </div>

                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-sm0 btn-secondary" name="Search">Update</button>

                            <a class="btn btn-sm0 btn-danger" href="{{route('category.index')}}" title="">Cancel </a>

                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
</div>


@endsection