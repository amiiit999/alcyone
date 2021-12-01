@extends('layouts.app')

@section('content')


<div class="card-header border rounded-0"><a href="{{route('product.create')}}"><button class="btn btn-sm btn-success border rounded">Add Product</button></a>
    <!-- <button class="btn btn-sm btn-danger rounded float-end">back</button> -->
</div>



<div class="row col px-5">


    @foreach($category as $cat)
    <h2 class="pt-4">{{$cat->name}}</h2>
   
    <div class="card rounded-0">
        <div class="row m-0 p-0">
            @forelse($products as $row)
            @if($row->category_id == $cat->id)
            <div class="col-md-2">
                <div class="card-block text-dark border" style="width: 11rem;">
                    <a href="">
                        <div class="text-center"> <a href="{{route('product.show',$row->id)}}"><img src="{{ url('') }}/images/{{$row->image ? $row->image : 'dafault.png'}}" class="image-fluid" width="140" height="240"></a> </div>
                    </a>
                    <div class="card-body">
                        <a href="{{route('product.show',$row->id)}}" class="text-dark" style="height: 18px;width: 140px;padding: 0;overflow: hidden;position: relative;display: inline-block;margin: 0 5px 0 5px;text-align: center;text-decoration: none;text-overflow: ellipsis;white-space: nowrap;"> {{$row->title}}</a>

                        <p class="ml-1">₹ {{$row->price}}</p>
                        
                        <div class="">

                            <a href="{{route('product.edit',$row->id)}}"><button class="btn btn-sm border border-primary rounded-0"><span class="px-2">Edit</span></button></a>
                            <form method="post" class="delete_form" action="{{route('product.destroy',$row->id)}}" style="display: inline">@method('DELETE') @csrf <button class="btn btn-sm border border-danger rounded-0 float-end" type="submit" title="Remove" onclick="return confirm('Are you sure want to delete?')">Remove</i></button>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
          
            @else

            @endif
            @empty
            <p>Not Available</p>
            @endforelse

        </div>
        
    </div>
    @endforeach
   

</div>
<div class="d-flex justify-content-center">
    {!! $products->links() !!}
</div>


@endsection