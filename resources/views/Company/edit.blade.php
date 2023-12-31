
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <title>Company</title>
</head>
<body>
<center>
<div class="container  mt-5">


<div class="row g-3 align-items-center">
    <div class="col">
      <div class="card" style="width: 30rem; hight:30rem ">

      <h3>Update Company Information</h3>

      <form action="{{ route('Company.update', $company->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="card-header border border-danger">

        <div class="form-group">

          <label for="title"><center><h4>Title</h4></center></label>
          <input type="text" class=" mb-2 text-body" id="title" name="title"
            value="{{ $company->title }}" required>
        </div>
        </div>

        <div class="card-header border border-dark">

        <div class="form-group">
          <label for="text"><center><h4>Address:</h4></center></label>
</br>
            <center>
          <textarea class=" la-2 text-body" id="address" name="address" style="width: 25rem; hight:25rem" required>{{ $company->address }}</textarea>
          </center>
        </div>
        </div>

        <div class="card-header border border-dark">

        <div class="form-group">
          <label for="phone"><center><h4>phone</h4></center></label>
          <textarea  class="form-control" id="phone" name="phone" rows="3" required>{{ $company->phone }}</textarea>
        </div>
        </div>
            <button type="submit" class="btn mt-3 btn-primary"><center>Update company</center></button>
      </form>
    </div>
  </div>
</div>
</div>

</center>
</body>
</html>
<div class="row h-100 justify-content-center align-items-center">
