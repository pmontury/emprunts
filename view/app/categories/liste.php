<h1><?= $titre; ?></h1>
<?= $paginator; ?>
<table>
    <thead>
        <tr>
            <th>Catégories</th>
            <th>Date création</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($categories as $categorie) { ?>
        <tr>
            <td><?= $categorie->nom; ?></td>
            <td><?= $categorie->created_at; ?></td>
        </tr>
    <?php } ?>
    </tbody>
</table>
<h1>Saisir une nouvelle catégorie</h1>
<form action="" method="post">
   <?= $form->label('Catégorie'); ?>
   <?= $form->input('categorie'); ?>
   <?= $form->error('categorie'); ?>
   
   <?= $form->submit('submitted', 'Valider'); ?>
</form>
