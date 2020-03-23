<h1 style="text-align: center;font-size:33px;margin-top: 10px;">
    <?= $titre; ?>
</h1>
<?= $paginator ?>
<table>
    <thead>
        <tr>
            <th>Titre</th>
            <th>Référence</th>
            <th>Description</th>
            <th class="colaction">Action</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($products as $product) { ?>
        <tr>
            <td><?= $product->titre; ?></td>
            <td><?= $product->reference; ?></td>
            <td><?= $product->description; ?></td>
            <td class="colaction">
               <a href="<?= $view->path('detailproducts',array($product->id)); ?>" title="Voir le produit"><i class="fi-eye size-30"></i></a>&nbsp;
               <a href="<?= $view->path('updateproducts',array($product->id)); ?>" title="Editer le produit"><i class="fi-pencil size-24"></i></a>&nbsp;
               <a href="<?= $view->path('deleteproducts',array($product->id)); ?>" title="Supprimer le produit" onclick="return confirm('Voulez-vous vraiment supprimer ce produit ?')">
                   <i class="fi-trash size-24"></i>
               </a>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>
<br>
<a href="<?= $view->path('addproducts'); ?>">Ajouter un produit</a>
