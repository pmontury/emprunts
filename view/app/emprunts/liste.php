<h1 style="text-align: center;font-size:33px;margin-top: 10px;">
    <?= $titre; ?>
</h1>
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
    <!-- <?php foreach($emprunts as $emprunt) { ?>
        <tr>
            <td><?= $emprunt->abonne; ?></td>
            <td><?= $emprunt->product; ?></td>
            <td><?= $emprunt->start_date; ?></td>
            <td class="colaction">
               <a href="<?= $view->path('detailproducts',array($product->id)); ?>" title="Voir le produit"><i class="fi-eye size-30"></i></a>&nbsp;
               <a href="<?= $view->path('updateproducts',array($product->id)); ?>" title="Editer le produit"><i class="fi-pencil size-24"></i></a>&nbsp;
               <a href="<?= $view->path('deleteproducts',array($product->id)); ?>" title="Supprimer le produit" onclick="return confirm('Voulez-vous vraiment supprimer ce produit ?')">
                   <i class="fi-trash size-24"></i>
               </a>
            </td>
        </tr>
    <?php } ?> -->
    </tbody>
</table>
<br>
<h1>Saisir un nouvel emprunt</h1>
<form action="" method="post">
   <?= $form->label('Abonnés'); ?>
   <?= $form->select('abonne', $abonnes, 'nom'); ?>

   <?= $form->label('Produits'); ?>
   <?= $form->select('produit', $products, 'titre'); ?>

   <?= $form->submit(); ?>
</form>
