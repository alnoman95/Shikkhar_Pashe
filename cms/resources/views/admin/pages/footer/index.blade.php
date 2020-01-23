@extends('admin.layouts.master') 
@section('title','Footer')
@section('content')
<div class="content-i">
    <div class="content-box">
        <div class="element-wrapper">
            <h6 class="element-header">
                All Footer
                <a class="btn btn-success btn-sm float-right mr-2" href="{{route('footer.create')}}">Add New</a>
            </h6>
            <div class="element-box">
                <div class="table-responsive">
                    <table width="100%" class="table table-bordered table-striped table-lightfont">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Blog</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Location</th>
                                <th>Image</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($footer as $key=>$item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $item->blog }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->phone }}</td> 
                                <td>{{ $item->location }}</td>
                                <td style="width:100px;"><img class="img-thumbnail" src="{{ asset('uploads/footer/'.$item->image) }}" alt=""></td>
                                <td class="text-center">
                                    <a class="btn btn-success btn-sm" href="{{route('footer.edit',$item->id)}}" title="edit"><i class="fa fa-edit"></i></a>
                                    
                                    <form id="delete-form-{{ $item->id }}" action="{{ route('footer.destroy',$item->id) }}"  style="display: none;" method="POST">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    <button type="button" title="Delete" class="btn btn-danger btn-sm mt-2" onclick="if(confirm('Are you sure? You want to delete this?')){
                                        event.preventDefault();
                                        document.getElementById('delete-form-{{ $item->id }}').submit();
                                        }else {
                                        event.preventDefault();
                                        }"><i class="fa fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection