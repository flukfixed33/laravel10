@extends('layouts.app')

@section('content')
<style>
    .image-product {
        max-width: 100px;
        max-height: 100%;
    }

    .pen {
        cursor: pointer;
        margin-right: 10px;
    }
</style>
<div class="container">
    <button class="btn btn-primary mb-2" style="float: right;" onclick="window.open('product/create','_self')">create</button>

    <table class="table text-center table-bordered">
        <tr>
            <th>No.</th>
            <th>name</th>
            <th>description</th>
            <th>category</th>
            <th>image</th>
            <th>action</th>
        </tr>
        @foreach($data as $k=>$x)
        <tr>
            <td>{{$k+1}}</td>
            <td>{{$x->name}}</td>
            <td>{{$x->description}}</td>
            <td>{{$x->category}}</td>
            <td><img class="image-product" src="{{url('/').'/image/'.$x->image}}"></img></td>
            <td>
                <a href="product/{{$x->id}}/edit">
                    <i class="fa-solid fa-pen pen" style="cursor: pointer;"></i>
                </a>

                <i class="fa-solid fa-trash" style="cursor: pointer;" onclick="con('{{$x->id}}')"></i>

            </td>
        </tr>
        @endforeach
    </table>



</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.7.1.min.js"></script>
<script type="text/javascript">
    function con(id){
        var result = confirm("Want to delete?");
                if (result) {
                    destroy1(id);
                }
    }
    
    function destroy1(id) {
        var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        // console.log(token);
        $.ajax({
            url: "product/" + id,
            type: 'POST',
            data: {
                _method: "DELETE",
                "id": id,
                "_token": token,
            },
            success: function() {

                console.log("it Works");
                location.reload();

            }
        });
    }
</script>
@endsection