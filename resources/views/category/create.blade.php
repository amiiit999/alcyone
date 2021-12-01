@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-info text-light"><b>{{ __('Add New Category') }}</b>

                    <a class="btn btn-sm btn-danger float-right" href="{{route('category.index')}}"> Back</a>
                </div>

                <div class="card-body text-left">


                    <form action="{{route('category.store')}}" method="POST" >
                        @csrf
                        <div class="col-md-12">
                            <strong>Category Name</strong>
                            <div class="form-group">
                                <input type="text" name="name" placeholder="Category Name" class="form-control">

                            </div>
                        </div>

                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-sm0 btn-secondary" name="Search">Submit</button>

                            <a class="btn btn-sm0 btn-danger" href="{{route('category.index')}}" title="">Cancel </a>

                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
</div>


@endsection