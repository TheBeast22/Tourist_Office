<div class="container h-100 mt-5">
  <div class="row h-100 justify-content-center align-items-center">
    <div class="col-10 col-md-8 col-lg-6">
      <h3>Update Post</h3>
      <form action="{{ route('Company.update', $company->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" class="form-control" id="title" name="title"
            value="{{ $company->title }}" required>
        </div>
        <div class="form-group">
          <label for="address">Address</label>
          <textarea class="form-control" id="address" name="address" rows="3" required>{{ $company->address }}</textarea>
        </div>
        <div class="form-group">
          <label for="phone">phone</label>
          <textarea class="form-control" id="phone" name="phone" rows="3" required>{{ $company->phone }}</textarea>
        </div>
        <button type="submit" class="btn mt-3 btn-primary">Update company</button>
      </form>
    </div>
  </div>
</div>
