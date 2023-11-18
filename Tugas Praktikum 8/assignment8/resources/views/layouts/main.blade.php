<!DOCTYPE html>
<html lang="en">
   <head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   {{-- <title>ClassicModels</title> --}}
   <title>ClassicModels | {{ $title }}</title>

   {{-- Bootstrap --}}
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

   {{-- CSS --}}
   <link rel="stylesheet" href="/css/style.css">

   {{-- Fonts --}}
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Bodoni+Moda:ital,opsz,wght@1,6..96,500&family=Domine:wght@400;500;600;700&family=Inter:wght@200;300;400;600&display=swap" rel="stylesheet">
</head>

<body>

   <div class="container mt-4">
      @yield('container')       
   </div>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>