<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Jura:wght@300;400;500&family=Martian+Mono:wght@100;200;300;400;500&family=Rajdhani:wght@300;400;500&family=Righteous&family=Roboto:ital,wght@0,300;0,400;1,300&family=Ubuntu:ital,wght@0,300;0,400;1,300;1,400&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Oswald&family=Playfair+Display:wght@800&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cormorant:ital,wght@0,300;0,400;1,300;1,400&family=Julius+Sans+One&family=Jura:wght@300;400;500&family=Martian+Mono:wght@100;200;300;400;500&family=Rajdhani:wght@300;400;500&family=Righteous&family=Roboto:ital,wght@0,300;0,400;1,300&family=Tilt+Prism&family=Ubuntu:ital,wght@0,300;0,400;1,300;1,400&display=swap" rel="stylesheet">
  
  <title>Presto.it</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  @vite (['resources/css/app.css', 'resources/js/app.js'])
  @livewireStyles
</head>
<body>
  <x-navbar/>
  
  
  <x-header/>
  <div class="">
    {{$slot}}
  </div>
  <x-footer/>    
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  @livewireScripts  
</body>
</html>