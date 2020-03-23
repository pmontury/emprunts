<h1><?= $titre; ?></h1>
<?= $paginator; ?>
<table>
    <thead>
        <tr>
            <th>Abonné</th>
            <th>Produit emprunté</th>
            <th>Date emprunt</th>
            <th class="colaction">Action</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($emprunts as $emprunt) { ?>
        <tr>
            <td><?= $emprunt->id_abonne; ?></td>
            <td><?= $emprunt->id_product; ?></td>
            <td><?= $emprunt->start_date; ?></td>
            <td class="colaction">
               <a href="<?= $view->path('updateemprunts',array($emprunt->id)); ?>" title="Retour produit"><i class="fi-pencil size-24"></i></a>&nbsp;
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>
<h1>Saisir un nouvel emprunt</h1>
<form action="" method="post">
   <?= $form->label('Abonnés'); ?>
   <?= $form->select('abonne', $abonnes, 'nom', '-- Choisissez un abonné --'); ?>

   <?= $form->label('Produits'); ?>
   <?= $form->select('produit', $products, 'titre', '-- Choisissez un produit --'); ?>

   <?= $form->submit(); ?>
</form>
