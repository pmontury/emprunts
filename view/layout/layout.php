<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les emprunts</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= $view->asset('css/reset.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?= $view->asset('css/foundation-icons.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?= $view->asset('css/style.css'); ?>">
  </head>
  <body>

   <header>
      <div class="wrap position">
         <nav>
             <ul>
                 <li><a href="<?= $view->path('liste'); ?>">Les abonnés</a></li>
                 <li><a href="<?= $view->path('listeproducts'); ?>">Les produits</a></li>
                 <li><a href="<?= $view->path('listeemprunts'); ?>">Les emprunts</a></li>
             </ul>
         </nav>
      </div>
    </header>

   <div class="container">
      <div class="wrap">
        <?= $content; ?>
      </div>
   </div>

   <footer>
      <div class="wrap position">
         <p>&copy; <?= date('Y'); ?> Les emprunts </p>
      </div>
   </footer>

    <script src="<?= $view->asset('js/main.js'); ?>"></script>
  </body>
</html>
