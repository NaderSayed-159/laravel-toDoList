
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Create Task</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Add Task</h2>


  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

  <form  method="post"  action="{{ url('/tasks') }}"  enctype ="multipart/form-data">
 

     @csrf
 

  <div class="form-group">
    <label for="exampleInputName1">Title</label>
    <input value="{{ old('title') }}" type="text" name="title" class="form-control" id="exampleInputName1"  placeholder="Enter Name">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Describtion</label>
    <input value="{{ old('describtion') }}" type="text" name="describtion" class="form-control" id="exampleInputEmail1"  placeholder="Enter email">
  </div>

 <input type="hidden" name="adder" value="{{ session('userData')[0]['id'] }}">






  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

</body>
</html>
