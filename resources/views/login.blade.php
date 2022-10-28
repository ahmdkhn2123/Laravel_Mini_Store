<html>
<head>
    <title>Login</title>
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

    @if (Session::has('error'))
    <div class="alert alert-danger">{{Session::get('error')}}</div>
    @endif
    <div class="col-md-5" style="margin:auto;">
    <h2 class="text-center">Login Here</h2>
    @if ($errors->any())
       @foreach ($errors->all() as $err)
         <li>{{$err}}</li>
       @endforeach
    @endif
        <form action="login" method="post">
            @csrf
            <div class="mb-3">
                <label>Email</label>
                <input type="text" name="email" placeholder="Enter Email" class="form-control">
            </div>
            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" placeholder="Enter Password" class="form-control">
            </div>

            <button type="submit" class="btn btn-success">Login</button>
            <a href="/">Are you New ?? Register Here !!</a>
        </form>
    </div>
</div>

</body>
</html>
