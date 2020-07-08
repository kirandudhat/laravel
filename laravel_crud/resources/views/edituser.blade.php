<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel CRUD opration</title>
    <link rel="stylesheet" href="{{ asset('public/assets/css/bootstrap.css')}}">
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
                <a href="{{route('showuser')}}" class="btn btn-primary">Back </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Users Edit</div>
                    <div class="card-body">
                        <form action="{{route('edituser', $userid->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                            <div class="form-group">
                                <label for="">User Name</label>
                                <input type="text" name="username" value="{{$userid->username}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">User Photo</label><br>
                                <img  src="{{URL::asset('storage/app/public/User_image/'.$userid->userphoto)}}" id="img" height="50" width="50"><br>

                                <input type="file"  id="image" name="userphoto">
                               
                            </div>
                            <div class="form-group">
                                 <button type="submit" name="submit" class="btn btn-primary">Edit User</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>