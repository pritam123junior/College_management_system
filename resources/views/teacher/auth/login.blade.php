<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>Login</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="p-3 m-0 border-0 bd-example m-0 border-0">
    <div class="container">
        <div class="row ">
            <div class="col-6 offset-3">                
                <form action="{{url('teacher/login')}}" method="POST" class="p-5 border rounded">
                    @csrf
                    <h3 class="text-center text-dark mb-5">Teacher Login</h3>
                    <div class="mb-3">
                        <label for="user_id" class="form-label">Teacher ID</label>
                        <input type="text" class="form-control" id="user_id" aria-describedby="user_id" name="user_id">                       
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>                   
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
