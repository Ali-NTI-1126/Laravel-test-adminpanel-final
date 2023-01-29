<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Your profile</title>
</head>
<body>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4" style="margin-top:20px;">
                <h4>Your Profile</h4>
                <hr>
                    <table class="table">
                        <thead>
                            <th>Username</th>
                            <th>First_name</th>
                            <th>Last_name</th>
                            <th>Mobile_number</th>

                            <th></th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $data->username }}</td>
                                <td>{{ $data->first_name }}</td>
                                <td>{{ $data->last_name }}</td>
                                <td>{{ $data->mobile_number }}</td>
                                <td></td>
                                <td><a class="btn btn-danger" href="/logout">logout</td></a>
                            </tr>
                        </tbody>
                    </table>
    
            </div>
            </div>
        </div>
</body>
</html>

