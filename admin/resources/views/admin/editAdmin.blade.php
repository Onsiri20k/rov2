@extends('home')

@section('content')

<div class="container">

  <h2>Edit User</h2>

  <div>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif

    <br>
    <form class="form-horizontal" method="post" action="{{ route('adminManagement.update', $user->id) }}">
        @method('PUT')
        @csrf
      <div class="form-group">
        <label class="control-label col-sm-2" for="name">Name:</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" name="name" value={{ $user->name }}></input>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="email">Email:</label>
        <div class="col-sm-9">          
          <input type="text" class="form-control" name="email" value={{ $user->email }}></input>
        </div>
      </div>

      <div class="form-group">      
        <label class="control-label col-sm-2" for="role">Role:</label>  
        <div class="col-sm-9">
          <div class="checkbox">
            <label class="radio-inline">
                <input type="radio" name="role" value="admin" <?php echo ($user->role=='admin' ? 'checked' : '');?>>Admin
            </label>
            <label class="radio-inline">
                <input type="radio" name="role" value="user" <?php echo ($user->role=='user' ? 'checked' : '');?>>User
            </label>
          </div>
        </div>
      </div>

      <div class="form-group">      
        <label class="control-label col-sm-2" for="status">Status:</label>  
        <div class="col-sm-9">
          <div class="checkbox">
            <label class="radio-inline">
                <input type="radio" name="status" value="active" <?php echo ($user->status=='active' ? 'checked' : '');?>>Active
            </label>
            <label class="radio-inline">
                <input type="radio" name="status" value="inactive" <?php echo ($user->status=='inactive' ? 'checked' : '');?>>Inactive
            </label>
          </div>
        </div>
      </div>

      <br>
      <div class="form-group">        
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </div>

    </form>

  <div>

</div>


@stop