<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>WittyMe - Home</title>
  <link rel="stylesheet" href="{{URL::to('css/app.css')}}">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons" rel="stylesheet">
</head>
<body>
  <div id="app">
    <home></home>
  </div>
</body>
<script async defer src="{{URL::to('js/app.js')}}"></script>
</html>