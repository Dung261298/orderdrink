<nav class="navbar navbar-expand-md fixed-top navbar-dark" style="background-color: skyblue;">
  <a class="navbar-brand" href="{{route('home.client')}}">Temple Client</a>
  <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{route('home.client')}}">Home <span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <div class="input-group mr-2">
        <input type="text" class="form-control" placeholder="Enter key work" aria-label="Enter key work" aria-describedby="basic-addon2">
        <div class="input-group-append">
          <button class="btn btn-outline-light" type="button">Search</button>
        </div>
      </div>
    </form>
    @auth('client')
    <div class="dropdown">
      <button class="btn btn-outline-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{ Auth::guard('client')->user()->name}} 
      </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="#">Profile</a>
        <a class="dropdown-item" href="{{ route('logout') }}"
        onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
        {{ __('Logout') }}
      </a>
      <form id="logout-form" action="{{  url('/clientLogout') }}" method="POST" style="display: none;">
        @csrf
      </form>
    </div>
  </div>
  @else
  <a href="{{route('loginClient.index')}}" class="btn btn-outline-light my-2 my-sm-0 mr-1">Login</a>
  @endauth
  <a href="{{route('cart.index')}}" class="btn btn-outline-light my-2 my-sm-0"
   style="margin-left: 7px">Cart</a>






  <!--  -->

</div>
</nav>