<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>@yield('title') </title>

    <style>
        .collapse{
            justify-content: center;
        }
        .nav-link {
            font-size: 20px;
            font-weight: bold;
            margin: 0px 20px;
        }
        li:hover {
          background-color: rgb(227, 169, 33);
        }
        .d-flex{
          padding-top: 20px;
        }
        #searchbtn{
          margin-left: 30px;
          color: white;
          background-color: rgb(208, 161, 51);
          border-radius: 10px
        }
        .form-control{
          text-align: center;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-warning">
        <div class="container-fluid">
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" href="/">Home</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
