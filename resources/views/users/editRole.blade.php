<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <script src="https://kit.fontawesome.com/4188a4641e.js" crossorigin="anonymous"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1 class="title has-text-centered">Edit User</h1>
    <hr>
    <div class="box container column is-one-quarter">
        <form action="{{ route('users.update/role', $user->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
          
            <div class="form-group">
                <label for="role_id">Role&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <select class="form-control" id="role_id" name="role_id">
                    <option value="1" {{ $user->role_id == 1 ? 'selected' : '' }}>user</option>
                    <option value="2" {{ $user->role_id == 2 ? 'selected' : '' }}>poweruser</option>
                </select>
            </div>
            <br>
        </div>
        <div class="has-text-centered">
            <button type="submit" class="button is-primary">Update</button>

        </div> 
    </form>
</body>
</html>
