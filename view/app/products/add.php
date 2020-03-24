<h1><?= $titre; ?></h1>

<form action="" method="post">
   <?= $form->label('Titre'); ?>
   <?= $form->input('titre'); ?>

   <?= $form->label('Référence'); ?>
   <?= $form->input('reference'); ?>

   <?= $form->label('Description'); ?>
   <?= $form->textarea('description'); ?>

   <?= $form->submit(); ?>
</form>
