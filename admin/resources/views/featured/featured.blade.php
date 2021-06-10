@extends('home')

@section('content')

  <div class="container">
    <h2>Featured Information</h2>
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
    <a style="margin: 20px;" href="{{ route('featured.formAdd')}}" class="btn btn-primary btn-lg active">Add Featured</a>
  </div> 

  <br>
  <div class="row">
    <div class="col-sm-12">
      <table class="table table-bordered table-hover" style="table-layout: fixed; word-wrap: break-word">
 
        <thead class="text-center" style="font-weight:bold; size:15px; background:#A9CCE3; color:black">
            <tr>
              <td width="19%">Photo</td>
              <td width="19%">Logo</td>
              <td width="15%">Title</td>
              <td width="20%">Description</td>
              <td width="10%">Text Indication</td>
              <td width="5%">Status</td>
              <td colspan = 2 width="12%">Actions</td>
            </tr>
        </thead>
        <tbody>
          @foreach($features as $feature)
          <tr>
              <td>{{$feature->photo}}</td>
              <td>{{$feature->logo}}</td>
              <td>{{$feature->title}}</td>
              <td>{{$feature->description}}</td>
              <td class="text-center">{{$feature->textIndication}}</td>
              <td class="text-center">{{$feature->status}}</td>
              <td class="text-center">
                  <a href="{{ route('featured.edit',$feature->id)}}" class="btn btn-primary">Edit</a>
              </td>
              <td class="text-center">
                  <form action="{{ route('featured.destroy',$feature->id)}}" method="post">
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