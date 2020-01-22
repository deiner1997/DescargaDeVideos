<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/style.css">
    <title>Hello Person</title>
  </head>
  <body>
    <div class="row">
  <div class="col-md-4">
  <h1 class="text-info">
  </h1></div>
  <div class="col-md-4">
    <h4 class="text-warning">Esta página es de practica.</h4></div>
  <div class="col-md-4">
  <img src="/images/laravel.png" alt="dskds" class="img-circle img"></div>
</div>
<div class="row">
<div class="col-md-4"></div>
<div class="col-md-4">
  <ul>
<?php foreach ($tasks as $task) : ?>
  <li><?= $task; ?></li>
<?php endforeach; ?>
  </ul>
  <ul>
    @foreach ($tasks as $task)
    <li>{{ $task }}</li>
    @endforeach
  </ul>
  <ul>
    @foreach ($tasks2 as $task)
    <li>{{ $task->body }}</li>
    @endforeach
  </ul>
</div>
<div class="col-md-4"></div>


  </body>
</html>
