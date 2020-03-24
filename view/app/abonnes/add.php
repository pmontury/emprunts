<h1><?= $titre; ?></h1>

<form action="" method="post">
   <?= $form->label('Nom'); ?>
   <?= $form->input('nom'); ?>
   <?= $form->error('nom'); ?>

   <?= $form->label('Prenom'); ?>
   <?= $form->input('prenom'); ?>
   <?= $form->error('prenom'); ?>

   <?= $form->label('Email'); ?>
   <?= $form->input('email'); ?>
   <?= $form->error('email'); ?>

   <?= $form->label('Age'); ?>
   <?= $form->input('age'); ?>
   <?= $form->error('age'); ?>

   <?= $form->submit(); ?>
</form>
