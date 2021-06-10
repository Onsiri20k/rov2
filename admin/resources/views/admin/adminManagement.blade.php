@extends('home')

@section('content')

  <div class="container">
    <h2>User Information</h2>
  </div>

  <div class="col-sm-12">
    @if(session()->get('success'))
      <div class="alert alert-success">
        {{ session()->get('success') }}  
      </div>
    @endif
  </div>


  <br>
  <div class="text-center">
    <a style="margin: 20px;" href="{{ route('adminManagement.formAdd')}}" class="btn btn-primary btn-lg active">Add User</a>
  </div> 

  <br>
  <div class="row">
    <div class="col-sm-12">
      <table class="table table-bordered table-hover">
        <thead class="text-center" style="font-weight:bold; size:15px; background:#A9CCE3; color:black">
            <tr>
              <td width="25%">Name</td>
              <td width="25%">Email</td>
              <td width="20%">Role</td>
              <td width="20%">Status</td>
              <td colspan = 2 width="10%">Actions</td>
            </tr>
        </thead>
        <tbody>
          @foreach($users as $user)
          <tr>
              <td>{{$user->name}}</td>
              <td>{{$user->email}}</td>
              <td class="text-center">{{$user->role}}</td>
              <td class="text-center">{{$user->status}}</td>
              <td>
                  <a href="{{ route('adminManagement.edit',$user->id)}}" class="btn btn-primary">Edit</a>
              </td>
              <td>
                  <form action="{{ route('adminManagement.destroy',$user->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure to delete?')">Delete</button>
                  </form>
              </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    <div>
  </div>

@stop