@extends('layouts.app')

@section('content')
<style>
    textarea {
        resize: none;
        height: 200px;
    }

    .img-product {
        max-width: 100%;
        max-height: 500px;
    }
</style>

<div class="container">
    
    @if(isset($product))
    <form method="POST" action="{{route('product.update',$product->id)}}" enctype="multipart/form-data">
    {{ method_field('PATCH') }}
    @else
    <form method="POST" action="{{route('product.store')}}" enctype="multipart/form-data">
    @endif    
    @csrf
        <div class="row mb-3">
            <div class="col">
                <span>name</span>
                <input type="text" name="name" aria-label="First name" class="form-control" value="{{isset($product)?$product->name:''}}">
            </div>
            <div class="col">
                <?php
                $arr = [1, 2, 3, 4]
                ?>

                <span>category</span>
                <select class="form-select" name="category" aria-label="Default select example">
                    @foreach($arr as $a)
                    <option value="{{$a}}" {{ isset($product)&&$product->category == $a?'selected':''}}>{{$a}}</option>
                    @endforeach


                </select>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col">
                <span>description</span>
                <div class="input-group">
                    <textarea class="form-control" name="description" aria-label="With textarea">{{isset($product)?$product->description:''}}</textarea>
                    
                </div>
            </div>
            <div class="col">
                <span>image</span>
                <div class="mb-3">
                    <input accept="image/" name="images" type="file" onchange="File(event)">
                    <img src="{{isset($product)?url('/image/').'/'.$product->image:''}}" alt="" class="img-product" id="preview" />
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col offset-6">
                <button type="submit" class="btn btn-primary"> Submit</button>
            </div>

        </div>
    </form>
</div>
<script>
    function File(event) {
        var input = event.target;
        var image = new FileReader();
        image.onload = function() {
            var dataURL = image.result;
            var output = document.getElementById('preview');
            output.src = dataURL;
        }
        image.readAsDataURL(input.files[0]);
    }
</script>

@endsection