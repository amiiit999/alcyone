@extends('layouts.app')

@section('content')

<div class="col-md-6 m-auto">
    <div class="card">
        <div class="card-header rounded-0"><a href="{{route('category.create')}}"><button class="btn btn-sm btn-success border border-dark rounded-0">Add Category</button></a>
        <!-- <button class="btn btn-sm btn-danger rounded float-end">back</button> -->
    </div>
        <div class="card-body">

            <table class="table table-bordered">
                <thead class="">
                   
                    @if($category->count() > 0)
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">ID</th>
                        <th scope="col">Category Name</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Updated At</th>

                        <th scope="col">Action</th>
                    </tr>
                    @endif
                </thead>
                <tbody>
                    
                        @forelse($category as $row)
                            <tr>
                            <th scope="row">1</th>
                            <td>{{ $row->id }}</td>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->created_at->isoFormat('YYYY-MM-DD') }}</td>
                            <td>{{ $row->updated_at->isoFormat('YYYY-MM-DD') }}</td>
                            <td>
                                <a href="{{route('category.edit',$row->id)}}" ><button class="btn btn-sm btn-primary text-white">Edit</button></a>
                                <form method="post" class="delete_form" action="{{route('category.destroy',$row->id)}}" style="display: inline">@method('DELETE') @csrf <button class="btn btn-sm btn-danger" type="submit" title="Remove" onclick="return confirm('Are you sure want to delete?')">Remove</button>
                                        </form>
                            </td>
                           
                          

                            </tr>
                        @empty
                            
                              <p>Data not Available.</p>
                            
                        @endforelse
                   
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection