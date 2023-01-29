<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4 " style="margin-top:20px;">
                <h4>Login</h4>
                <hr>
                <form action="{{ route('login-user') }}" method="POST">
                    @if (Session::has('success'))
                        <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif
                    @if (Session::has('fail'))
                        <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                    @endif

                    @csrf
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" placeholder="Enter your username" name="username" value="{{ old('username') }}">
                        <span class="text-danger">@error('username') {{ $message }}@enderror</span>
                    </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" placeholder="Enter your password" name="password" value="{{ old('password') }}">
                            <span class="text-danger">@error('password') {{ $message }}@enderror</span>
                        </div>
                            
                        <br>
                    <div class="form-group">
                        <button class="btn btn-block btn-primary" type="submit">login</button>
                    </div>
                    <br>
                    <a href="registration">New User? Register Here</a>

                </form>
        </div>
    </div>
    </div>
</body>
</html>