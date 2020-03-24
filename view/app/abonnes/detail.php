<h1><?= $titre; ?></h1>
<table>
    <thead>
        <tr>
            <th>id</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Age</th>
            <th>created_at</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?= $abonne->id; ?></td>
            <td><?= $abonne->nom; ?></td>
            <td><?= $abonne->prenom; ?></td>
            <td><?= $abonne->age; ?></td>
            <td><?= date('d/m/Y',strtotime($abonne->created_at)); ?></td>
        </tr>
    </tbody>
</table>
