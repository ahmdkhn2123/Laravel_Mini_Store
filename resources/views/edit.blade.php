<html>
<head>
    <title>Update Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>

<div class="container">
    @if (Session::has('success'))
    <div class="alert alert-success">{{Session::get('success')}}</div>
    @endif

    <div class="col-md-5" style="margin:auto;">
    <h4 class="text-center" style="color:Blue;">Update Here</h4>
        <form action="/update/{{$data->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label>Product Name</label>
                <input type="text" name="prod_name" placeholder="Enter Name" class="form-control" value="{{$data->product_name}}">
            </div>

            <div class="mb-3">
                <label>Product Price</label>
                <input type="text" name="prod_price" placeholder="Enter Price" class="form-control" value="{{$data->product_price}}">
            </div>

            <button type="submit" class="btn btn-success">Update</button>

        </form>
    </div>
</div>

</body>
</html>
