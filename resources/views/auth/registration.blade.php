<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Registration</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4" style="margin-top:20px;">
                <h4>Registration</h4>
                <hr>
                <form action="{{ route('register-user') }}" method="POST">
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
                    <label for="first_name">First name</label>
                    <input type="text" class="form-control" placeholder="Enter your first name" name="first_name" value="{{ old('first_name') }}">
                    <span class="text-danger">@error('first_name') {{ $message }}@enderror</span>
                    </div>


                    <div class="form-group">
                        <label for="last_name">Last name</label>
                        <input type="text" class="form-control" placeholder="Enter your last name" name="last_name" value="{{ old('last_name') }}">
                        <span class="text-danger">@error('last_name') {{ $message }}@enderror</span>
                    </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" placeholder="Enter your password" name="password" value="{{ old('password') }}">
                            <span class="text-danger">@error('password') {{ $message }}@enderror</span>
                        </div>
                            
                        <div class="form-group">
                            <label for="password_confirmation">Confirm Password&nbsp;&nbsp;&nbsp;</label>
                            <input type="password" class="form-control" placeholder="Confirm your password" id="password_confirmation" name="password_confirmation">
                            <span class="text-danger">@error('password_confirmation') {{ $message }}@enderror</span>

                        </div>                         

                        <div class="form-group">
                            <label for="mobile_number">Mobile number</label>
                            <input type="tel" class="form-control" placeholder="Enter your mobile number" name="mobile_number" value="{{ old('mobile_number') }}">
                            <span class="text-danger">@error('mobile_number') {{ $message }}@enderror</span>
                            </div>

                        <br>
                    <div class="form-group">
                        <button class="btn btn-block btn-primary" type="submit">Register</button>
                    </div>
                    <br>
                    <a href="/">Already Registerd? Login Here</a>


                </form>
        </div>
    </div>
    </div>
</body>
</html>