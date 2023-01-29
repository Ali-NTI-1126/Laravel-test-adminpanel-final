<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <script src="https://kit.fontawesome.com/4188a4641e.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <title>Admin Page</title>
</head>
<body>
    <h1 class="title has-text-centered">
        All users 
    </h1>
    <hr>
        <div>
            @if (Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif
            @if (Session::has('fail'))
            <div class="alert alert-danger">{{ Session::get('fail') }}</div>
            @endif
        </div>

    <div class="container">
        <div class="row">
            <div class="column" style="margin-top:20px;">
                <a class=" button is-danger" href="/logout">logout</a>
            </div>
        </div>
        </div>

    <table class="table is-striped container is-center">
    <tr>
        <th>user_id</th>
        <th>username</th>
        <th>first_name</th>
        <th>last_name</th>
        <th>mobile_number</th>
        <th>role_id</th>
        <th><a class="button is-success is-rounded is-small" href="{{ url('/user.create') }}">New user &nbsp;<i class="fa-solid fa-user-plus"></i></a></th>
        <th></th>
    </tr>
            
    @foreach ($users as $user)
    <tr>
        <td>{{ $user->id}}</td>
        <td>{{ $user->username }}</td>
        <td>{{ $user->first_name }}</td>
        <td>{{ $user->last_name }}</td>
        <td>{{ $user->mobile_number }}</td>
        <th>{{ $user->role_id }}</th>
        <td><a class="button is-warning is-rounded is-small" href="{{ url('/edituser/'.$user->id) }}">Edit &nbsp;<i class="fa-solid fa-user-pen"></i></a></td>

        <td>
        <form method="POST" action="{{ url('/deleteuser/'.$user->id) }}">
        @method('delete')
        @csrf
        <button class="button is-danger is-rounded is-small" type="submit">Delete  &nbsp;<i class="fa-solid fa-user-xmark"></i></button>
        </form>
        </td>
    </tr>
@endforeach
   
</table>
<br><br>

</div>


</body>
</html>