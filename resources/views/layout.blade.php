<!DOCTYPE html>
<html lang="en">
<head>

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="routename" content="{{ Route::currentRouteAction() }}">



  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <script src="https://kit.fontawesome.com/fe02ebbd3b.js" crossorigin="anonymous"></script>


  <title>Ofertas!</title>

</head>
<body>
  <div class="container py-4">
    <div class="row">
      @yield('content')
    </div>
  </div>

  @if($errors->any() || session('status') || session('message'))
  <div class="alert alert-danger notify alert-dismissible fade show mt-4 mx-4" role="alert" id="alert">
    @if(isset($message))
    <span class="bold">{{ Session::get('message') }}</span>
    @else
    {{ session('status') }}
    @endif
    <ul>
      @foreach($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  @endif



  <script src="{{ asset('js/app.js') }}"></script>
  <script src="{{ asset('js/getType.js') }}"></script>
</body>
</html>
