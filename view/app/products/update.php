<h1 style="text-align: center;font-size:33px;margin-top: 10px;">
    <?= $titre; ?>
</h1>

<form action="" method="post">
   <?= $form->label('Titre'); ?>
   <?= $form->input('titre', $product->titre); ?>

   <?= $form->label('Référence'); ?>
   <?= $form->input('reference', $product->reference); ?>

   <?= $form->label('Description'); ?>
   <?= $form->textarea('description', $product->description); ?>

   <?= $form->submit(); ?>
</form>
