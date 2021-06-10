<!DOCTYPE html>
<html lang="en">
<head>
  <title>RoV eSports Website</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
</head>
<body>

<nav class="navbar navbar-inverse navbar-dark navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand">RoV eSports</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">

      <ul class="nav navbar-nav">

        <li class="{{ (request()->is('admin/featured')) ? 'active' : '' }}">  
          <a href="{{ url('/admin/featured' )}}" ></i> Featured</a>
        </li>
        <li class="{{ (request()->is('admin/rplActivity')) ? 'active' : '' }}">  
          <a href="{{url('/admin/rplActivity')}}"> RPL activity</a>
        </li>
        <li class="{{ (request()->is('admin/tournament')) ? 'active' : '' }}">
          <a href="{{url('/admin/tournament')}}"> Tournament</a>
        </li>      
        
      </ul>
      
      <ul class="nav navbar-nav navbar-right">

        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user" ></span> {{ Auth::user()->name ?? '-' }}
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            @if (Auth::user()->role == 'admin')
              <li><a href="/admin/adminManagement">Admin Management</a></li>
            @endif
            <li ><a href="/admin/logout" onclick="return confirm('Are you sure to logout?')"><span class="glyphicon glyphicon-log-in" ></span> Logout</a></li>
          </ul>
        </li>
       
      </ul>

    </div>
  </div>
</nav>

<div class="container-fluid" style="padding-top:60px">
    @yield('content') 
</div>


</body>
</html>

