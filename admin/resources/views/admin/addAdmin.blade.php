@extends('home')

@section('content')

  <div class="container">

  <h2>Add User</h2>

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
      <form class="form-horizontal" method="post" action="{{ route('adminManagement.store') }}">
          @csrf
        <div class="form-group">
          <label class="control-label col-sm-2" for="name">Name:</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" placeholder="Enter name" name="name"></input>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="email">Email:</label>
          <div class="col-sm-9">          
            <input type="text" class="form-control" placeholder="Enter email" name="email"></input>
          </div>
        </div>

        <div class="form-group">      
          <label class="control-label col-sm-2" for="role">Role:</label>  
          <div class="col-sm-9">
            <div class="checkbox">
              <label class="radio-inline">
                  <input type="radio" name="role" value="admin" checked>Admin
              </label>
              <label class="radio-inline">
                  <input type="radio" name="role" value="user">User
              </label>
            </div>
          </div>
        </div>

        <div class="form-group">      
          <label class="control-label col-sm-2" for="status">Status:</label>  
          <div class="col-sm-9">
            <div class="checkbox">
              <label class="radio-inline">
                  <input type="radio" name="status" value="active" checked>Active
              </label>
              <label class="radio-inline">
                  <input type="radio" name="status" value="inactive">Inactive
              </label>
            </div>
          </div>
        </div>

        <br>
        <div class="form-group">        
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </div>

      </form>

    <div>
  </div>


@stop