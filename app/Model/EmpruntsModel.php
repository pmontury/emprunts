<?php /* app/Model/AbonnesModel.php */

namespace App\Model;

use App\App;

class EmpruntsModel extends \App\Weblitzer\Model
{
   protected static $table = 'emprunts';

   public static function allByPageJoint($itemsPerPage, $offset, $orderCol = false, $order = 'ASC')
   {
      $sql = "SELECT emp.id, emp.start_date, abo.nom, abo.prenom , pro.titre FROM " . self::getTable() . " AS emp ";
      $sql .= "LEFT JOIN " . AbonnesModel::getTable() . " AS abo ON emp.id_abonne = abo.id ";
      $sql .= "LEFT JOIN " . ProductsModel::getTable() . " AS pro ON emp.id_product = pro.id ";
      $sql .= "WHERE emp.end_date IS NULL ";
      if ($orderCol) {
         $sql .= "ORDER BY ".$orderCol." ".$order;
      }
      $sql .= " LIMIT ".$itemsPerPage." OFFSET ".$offset;

      return App::getDatabase()->query($sql, get_called_class());
   }

   public static function countEnCours()
   {
      return App::getDatabase()->aggregation("SELECT COUNT(id) FROM " . self::getTable() . " WHERE end_date IS NULL" );
   }

   public static function insert($post)
   {
      App::getDatabase()->prepareInsert("INSERT INTO " . self::getTable() .
                                       " (id_abonne, id_product, start_date) VALUES (?,?,NOW()) ",
                                       [$post['abonne'],$post['produit']]);
   }

   public static function update($id)
   {
      App::getDatabase()->prepareInsert("UPDATE " . self::getTable() . " SET end_date = NOW() WHERE id = ?",[$id]);
   }

}
