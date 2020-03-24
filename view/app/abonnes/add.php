<h1><?= $titre; ?></h1>

<form action="" method="post">
   <?= $form->label('Nom'); ?>
   <?= $form->input('nom'); ?>

   <?= $form->label('Prenom'); ?>
   <?= $form->input('prenom'); ?>

   <?= $form->label('Email'); ?>
   <?= $form->input('email'); ?>

   <?= $form->label('Age'); ?>
   <?= $form->input('age'); ?>

   <?= $form->submit(); ?>
</form>
