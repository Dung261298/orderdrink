<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Login</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <base href="{{asset('')}}"> <!--Khai bao duong dan mac dinh -->
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="admin/login/login.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">

</head>

<body>
   <div class="col-md-12 mt-3">
                <!--Main-->
                @yield('content')
            </div>
</body>
</html>