<h1 style="text-align: center;font-size:33px;margin-top: 10px;">
    <?= $message; ?>
</h1>
<h1>Statistiques</h1>
<table class="stats">
   <tbody>
      <tr>
         <td class="statstitle">Nombre d'abonnés</td><td>:</td><td><?= $stats['nb_abonnes']; ?></td>
      </tr>
      <tr>
         <td class="statstitle">Nombre de produits</td><td>:</td><td><?= $stats['nb_products']; ?></td>
      </tr>
      <tr>
         <td class="statstitle">Nombre de catégories</td><td>:</td><td><?= $stats['nb_cats']; ?></td>
      </tr>
      <tr>
         <td class="statstitle">Nombre total d'emprunts</td><td>:</td><td><?= $stats['nb_emprunts_tot']; ?></td>
      </tr>
      <tr>
         <td class="statstitle">Nombre d'emprunts en cours</td><td>:</td><td><?= $stats['nb_emprunts_encours']; ?></td>
      </tr>
   </tbody>
</table>
