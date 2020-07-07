<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel CRUD opration</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css')}}">
</head>
<body class=bg-light>
    <div class="p-3 mb-2 bg-dark text-white">
        <div class="container">
            <div class="h3">LARAVEL CRUD OPRATION</div>
        </div>
   </div>
   <div class="container">
        <div class="row">
            <div class="col-md-12 text-right">
                <a href="{{route('adduser')}}" class="btn btn-primary">ADD NEW USERS </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Users List</div>
                    <div class="card-body">
                        <table class="table">
                            <thead class="thead-dark">
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Photo</th>
                                <th width="100">Edit</th>
                                <th width="100">Delete</th>
                            </tr>
                            </thead>
                            @if($users)
                                @foreach($users as $user)
                            <tr>
                                <th>{{$user->id}}</th>
                                <th>{{$user->username}}</th>
                                <th><img src="{{URL::asset('storage/app/public/User_images/'.$user->userphoto)}}" height="30px" width="30px" />

</th>
                                <th> <a href="" class="btn btn-primary">Edit</a> </th>
                                <th> <a href="" class="btn btn-danger">Delete</a> </th>
                            </tr>
                                @endforeach
                            @else
                            <tr>
                                <td colspan="6">Users not added yet</td>
                            </tr>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>