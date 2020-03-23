<h1 style="text-align: center;font-size:33px;margin-top: 10px;">
    <?= $titre; ?>
</h1>

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
