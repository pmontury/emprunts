<h1><?= $titre; ?></h1>

<form action="" method="post">
   <?= $form->label('Titre'); ?>
   <?= $form->input('titre'); ?>
   <?= $form->error('titre'); ?>

   <?= $form->label('Référence'); ?>
   <?= $form->input('reference'); ?>
   <?= $form->error('reference'); ?>

   <?= $form->label('Description'); ?>
   <?= $form->textarea('description'); ?>
   <?= $form->error('description'); ?>

   <?= $form->label('Categories'); ?>
   <?= $form->select('categorie', $categories, 'nom', '-- Choisissez une catégorie --'); ?>
   <?= $form->error('categorie'); ?>

   <?= $form->submit(); ?>
</form>
