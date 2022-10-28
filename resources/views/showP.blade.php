<?php
use App\Http\Controllers\ProductController;
$total=ProductController::countP();
?>


<html>
<head>
    <title>Show</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>


<h1 class="text-center">Detail, Total Products = {{$total}}</h1>
@if (Session::has('success'))
    <div class="alert alert-success">{{Session::get('success')}}</div>
@endif


<table class="table table-striped  table-bordered border-primary ">
<a href="addP" class="btn btn-primary" style="margin-bottom:10px; margin-left:5px;">Add More Products </a>

    <tr>
        <th><h3><b>ID</b></h3></th>
        <th><h3><b>Product Name</b></h3></th>
        <th><h3><b>Product Price</b></h3></th>
        <th><h3><b>Product Picture</b></h3></th>
        <th><h3><b>Operations</b></h3></th>


    </tr>
    @foreach($data as $data)
    <tr>
        <th>{{$data->id}}</th>
        <th>{{$data->product_name}}</th>
        <th>{{$data->product_price}}</th>
        <th><img src="{{ asset('image/'. $data->product_picture) }}" width="50" height="60"/></th>
        <th><a href="delete/{{$data['id']}}"><button class="btn btn-danger">Delete</button></a>
        <a href="edit/{{$data['id']}}"><button class="btn btn-success">Edit</button></a></th>
    </tr>
    @endforeach


</table>





</body>
</html>
