
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add User</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Create User</h2>


  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif




  <form  method="post"  action="{{ url('/users') }}"  enctype ="multipart/form-data">
 

     @csrf
 

  <div class="form-group">
    <label for="exampleInputName1">Name</label>
    <input value="{{ old('name') }}" type="text" name="name" class="form-control" id="exampleInputName1"  placeholder="Enter Name">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input value="{{ old('email') }}" type="text" name="email" class="form-control" id="exampleInputEmail1"  placeholder="Enter email">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">New Password</label>
    <input value="{{ old('passowrd') }}" type="password"  name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>

  
  <div class="form-group">
    <label for="exampleInputPassword1">Type</label>
    <select name="type" id="type" class="form-control">
      <option value="1">Admin</option>
      <option value="2">Standard</option>
    </select>
    {{-- <input value="{{ old('type') }}" type="text"  name="type" class="form-control" id="exampleInputPassword1" placeholder="Type"> --}}
  </div>
 
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

</body>
</html>
