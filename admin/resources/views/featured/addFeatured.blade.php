@extends('home')

@section('content')

  <div class="container">

  <h2>Add Featured</h2>

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
      <form class="form-horizontal" method="post" action="{{ route('featured.store') }}">
          @csrf
        <div class="form-group">
          <label class="control-label col-sm-2" for="photo">Photo:</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" placeholder="Enter photo url" name="photo"></input> 
            <small class="form-text text-muted">photo size : 1270x715 pixels</small> 
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="logo">Logo:</label>
          <div class="col-sm-9">          
            <input type="text" class="form-control" placeholder="Enter logo url" name="logo"></input>  
            <small class="form-text text-muted">logo size : 232x232 pixels</small> 
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="title">Title:</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" placeholder="Enter title" name="title"></input>  
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="description">Description:</label>
          <div class="col-sm-9">          
            <input type="text" class="form-control" placeholder="Enter description" name="description"></input>  
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="textIndication">Text Indication:</label>
          <div class="col-sm-9">          
            <input type="text" class="form-control" placeholder="Enter text indication" name="textIndication"></input>  
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