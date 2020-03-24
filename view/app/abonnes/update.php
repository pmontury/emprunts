<h1><?= $titre; ?></h1>

<form action="" method="post">
   <?= $form->label('Nom'); ?>
   <?= $form->input('nom', $abonne->nom); ?>

   <?= $form->label('Prenom'); ?>
   <?= $form->input('prenom', $abonne->prenom); ?>

   <?= $form->label('Email'); ?>
   <?= $form->input('email', $abonne->email); ?>

   <?= $form->label('Age'); ?>
   <?= $form->input('age', $abonne->age); ?>

   <?= $form->submit(); ?>
</form>
