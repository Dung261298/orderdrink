<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>@yield('title')</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <base href="{{asset('')}}"> <!--Khai bao duong dan mac dinh -->
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="admin/style.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">

</head>

<body>
    <div class="wrapper">
        <!-- Sidebar -->
        @include("admin.shared.sidebar")
        <div id="content">
            <!--Header-->
            @include("admin.shared.header")
            <div class="col-md-12 mt-3">
                <!--Main-->
                @yield('content')
            </div>
            <!-- @include("admin.shared.footer") -->
        </div>
        <div class="overlay"></div>
</div>  
<!-- jQuery CDN - Slim version (=without AJAX) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<!-- Popper.JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
<script>
 $(document).ready(function () {
  $('#sidebarCollapse').on('click', function () {
      $('#sidebar').toggleClass('active');
  });
});
 $(document).ready(function () {
  $("#sidebar").mCustomScrollbar({
   theme: "minimal"
});
  $('#sidebarCollapse').on('click', function () {
		    // open or close navbar
		    $('#sidebar').toggleClass('active');
		    // close dropdowns
		    $('.collapse.in').toggleClass('in');
		    // and also adjust aria-expanded attributes we use for the open/closed arrows
		    // in our CSS
		    $('a[aria-expanded=true]').attr('aria-expanded', 'false');
		});
});	
 $(document).ready(function () {
    $('#dismiss, .overlay').on('click', function () {
            // hide sidebar
            $('#sidebar').removeClass('active');
            // hide overlay
            $('.overlay').removeClass('active');
        });
});
</script>
</script>
     <!-- lấy id của hàng dc cho gắn vào form modal -->
    <script type="text/javascript">
    $(document).on('click','.deletebutton',function(){
        var userID=$(this).attr('data-id');
        $('#id').val(userID);
    });
</script>
@yield('scriptAdmin')
</body>
</html>