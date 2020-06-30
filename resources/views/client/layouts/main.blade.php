<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}" />

  <title>@yield('title')</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <base href="{{asset('')}}"> <!--Khai bao duong dan mac dinh -->
  <!-- Bootstrap core JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" ></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- Custom styles for this template -->
  <link href="client/templeClient.css" rel="stylesheet">
  <script type="text/javascript">
    $(function () {
      'use strict'

      $('[data-toggle="offcanvas"]').on('click', function () {
        $('.offcanvas-collapse').toggleClass('open')
      })
    })
  </script>
  <script src="https://use.fontawesome.com/84fa893168.js"></script>
</head>

<body class="bg-light">

  <!--Header-->
  @include("client.shared.header")
  <!--TagScroller-->
  @include("client.shared.tagscroller")
  <!--Main-->
  @yield('content')
  <!--Footer-->
  @include("client.shared.footer")
  @yield('scriptClient1')
</body>
</html>
<script>
  setTimeout(function(){$(".notification").hide();},2500);
</script>
