<h1><?= $titre; ?></h1>

<form action="" method="post">
   <?= $form->label('Titre'); ?>
   <?= $form->input('titre', $product->titre); ?>

   <?= $form->label('Référence'); ?>
   <?= $form->input('reference', $product->reference); ?>

   <?= $form->label('Description'); ?>
   <?= $form->textarea('description', $product->description); ?>

   <?= $form->submit(); ?>
</form>
