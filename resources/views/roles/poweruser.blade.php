<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <script src="https://kit.fontawesome.com/4188a4641e.js" crossorigin="anonymous"></script>
    <title>Poweruser Page</title>
</head>
<body>
    <h1 class="title has-text-centered">
        All users 
    </h1>
    <hr>

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
        <td><a class="button is-warning is-rounded is-small" href="{{ url('/edituser/role/'.$user->id) }}">Change role &nbsp;<i class="fa-solid fa-user-pen"></i></a></td>

    </td>
</tr>
@endforeach
</table>

</body>
</html>