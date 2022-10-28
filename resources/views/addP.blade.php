<html>
<head>
    <title>Add Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>

<div class="container">
    @if (Session::has('success'))
    <div class="alert alert-success">{{Session::get('success')}}</div>
    @endif

    @if (Session::has('fail'))
    <div class="alert alert-danger">{{Session::get('fail')}}</div>
    @endif
    <div class="col-md-5" style="margin:auto;">
    <h1 class="text-center" style="color:Red;">Welcome {{Session::get('user')['name']}}</h1>
    <h4 class="text-center" style="color:Blue;">Add Here</h4>
    @if ($errors->any())
       @foreach ($errors->all() as $err)
         <li>{{$err}}</li>
       @endforeach
    @endif
        <form action="addP" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label>Product Name</label>
                <input type="text" name="prod_name" placeholder="Enter Name" class="form-control">
            </div>
            <div class="mb-3">
                <label>Product Price</label>
                <input type="text" name="prod_price" placeholder="Enter Price" class="form-control">
            </div>
            <div class="mb-3">
                <label>Product Picture</label>
                <input type="file" name="prod_pic" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Add</button>
            <a href="logout" class="btn btn-danger">Logout</a>
            <a href="showP" class="btn btn-primary">Show Your Products</a>

        </form>
    </div>
</div>

</body>
</html>
