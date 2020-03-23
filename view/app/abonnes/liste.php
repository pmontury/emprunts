<h1 style="text-align: center;font-size:33px;margin-top: 10px;">
    <?= $titre; ?>
</h1>
<table>
    <thead>
        <tr>
            <th>id</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Age</th>
            <th>created_at</th>
            <th class="colaction">Action</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($abonnes as $abonne) { ?>
        <tr>
            <td><?= $abonne->id; ?></td>
            <td><?= $abonne->nom; ?></td>
            <td><?= $abonne->prenom; ?></td>
            <td><?= $abonne->age; ?></td>
            <td><?= date('d/m/Y',strtotime($abonne->created_at)); ?></td>
            <td class="colaction">
               <!-- <a href="<?= $view->path('detail',array($abonne->id)); ?>" title="Voir l'article"><i class="fi-eye size-30"></i></a>&nbsp; -->
               <a href="<?= $view->path('update',array($abonne->id)); ?>" title="Editer l'abonné"><i class="fi-pencil size-24"></i></a>&nbsp;
               <a href="<?= $view->path('delete',array($abonne->id)); ?>" title="Supprimer l'abonné" onclick="return confirm('Voulez-vous vraiment supprimer cet article ?')">
                   <i class="fi-trash size-24"></i>
               </a>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>
<br>
<a href="<?= $view->path('add'); ?>">Ajouter un abonné</a>
