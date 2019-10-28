<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>Mini MVC</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link href="/Css/style_layout.css" rel="stylesheet" type="text/css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="/js/custom.js"></script>
    <link rel="stylesheet" href="/css/custom.css">
</head>
<body>
    <div class="container">
         <div class="row">
             <div class="col-12">
                 <div class="row d-flex flex-row justify-content-between">
                     <div>
                         <a href="/" class="homeLink">Задачник</a>
                     </div>
                     <div>
                         <? if ($this->isAuth()):?>
                             <a class="navbar-brand" href="/authorization/logout">Выйти</a>
                         <? else: ?>
                             <a class="navbar-brand" href="/authorization">Войти</a>
                         <? endif; ?>
                     </div>
                 </div>
             </div>
             <section class="main">
                 <div class="col-12">
                     <div class="row">
                         <?= $body ?>
                     </div>
                  </div>
             </section>
         </div>
    </div>
</body>
</html>