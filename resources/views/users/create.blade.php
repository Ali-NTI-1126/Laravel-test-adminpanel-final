<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <script src="https://kit.fontawesome.com/4188a4641e.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <h1 class="title has-text-centered">Add new user</h1>
    <hr>

    <div class="box container column is-one-quarter">
        <form action="{{ route('users.store') }}" method="post">
            @csrf

            <div class="form-group">
                <label for="username">Username&nbsp;&nbsp;</label>
                <input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}">
                <span class="text-danger">@error('username') {{ $message }}@enderror</span>

            </div>

            <div class="form-group">
                <label for="first_name">First Name&nbsp;</label>
                <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name') }}">
                <span class="text-danger">@error('first_name') {{ $message }}@enderror</span>

            </div>

            <div class="form-group">
                <label for="last_name">Last Name&nbsp;</label>
                <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name') }}">
                <span class="text-danger">@error('last_name') {{ $message }}@enderror</span>

            </div>

            <div class="form-group">
                <label for="password">Password&nbsp;&nbsp;&nbsp;</label>
                <input type="password" class="form-control" id="password" name="password">
                <span class="text-danger">@error('password') {{ $message }}@enderror</span>

            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirm Password&nbsp;&nbsp;&nbsp;</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                <span class="text-danger">@error('password_confirmation') {{ $message }}@enderror</span>

            </div>              

            <div class="form-group">
                <label for="mobile_number">Mobile No.</label>
                <input type="text" class="form-control" id="mobile_number" name="mobile_number" value="{{ old('mobile_number') }}">
                <span class="text-danger">@error('mobile_number') {{ $message }}@enderror</span>

            </div>

            <div class="form-group">
                <label for="role_id">Role&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <select class="form-control" id="role_id" name="role_id">
                    <option value="1">user</option>
                    <option value="2">poweruser</option>
                </select>
                <span class="text-danger">@error('role_id') {{ $message }}@enderror</span>

            </div>
             <br>
        
    </div>
    <div class="has-text-centered">
        <button type="submit" class="button is-primary">Save</button>
        </div> 
    </form>
</body>
</html>
