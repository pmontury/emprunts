<h1 style="text-align: center;font-size:33px;margin-top: 10px;">
    <?= $titre; ?>
</h1>
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
