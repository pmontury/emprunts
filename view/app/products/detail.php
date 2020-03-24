<h1><?= $titre; ?></h1>
<table>
    <thead>
        <tr>
            <th>Titre</th>
            <th>Réference</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?= $product->titre; ?></td>
            <td><?= $product->reference; ?></td>
            <td><?= $product->description; ?></td>
        </tr>
    </tbody>
</table>
