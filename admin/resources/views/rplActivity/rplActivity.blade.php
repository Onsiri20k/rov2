@extends('home')

@section('content')

  <div class="container">
    <h2>RPL Activity Information</h2>
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
    <a style="margin: 20px;" href="{{ route('rplActivity.formAdd')}}" class="btn btn-primary btn-lg active">Add RPL Activity</a>
  </div> 

  <br>
  <div class="row">
    <div class="col-sm-12">
      <table class="table table-bordered table-hover" style="table-layout: fixed; word-wrap: break-word">
        <thead class="text-center" style="font-weight:bold; size:15px; background:#A9CCE3; color:black">
            <tr>
              <td width="24%">Photo</td>
              <td width="24%">Title</td>
              <td width="25%">Description</td>
              <td width="10%">Text Indication</td>
              <td width="5%">Status</td>
              <td colspan = 2 width="12%">Actions</td>
            </tr>
        </thead>
        <tbody>
          @foreach($rplActivities as $rplActivity)
          <tr>
              <td>{{$rplActivity->photo}}</td>
              <td>{{$rplActivity->title}}</td>
              <td>{{$rplActivity->description}}</td>
              <td class="text-center">{{$rplActivity->textIndication}}</td>
              <td class="text-center">{{$rplActivity->status}}</td>
              <td class="text-center">
                  <a href="{{ route('rplActivity.edit',$rplActivity->id)}}" class="btn btn-primary">Edit</a>
              </td>
              <td class="text-center">
                  <form action="{{ route('rplActivity.destroy',$rplActivity->id)}}" method="post">
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