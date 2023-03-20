<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @vite(['resources/js/app.js','resources/css/app.css'])

    <title>Tech Space H67</title>
  </head>
  <body>
    
    <x-navbar/>

    {{$slot}}

  </body>
</html>