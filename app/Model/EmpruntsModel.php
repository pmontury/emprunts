<?php /* app/Model/AbonnesModel.php */

namespace App\Model;

use App\App;

class EmpruntsModel extends \App\Weblitzer\Model
{
   protected static $table = 'emprunts';

   public static function allEnCours()
   {
      return App::getDatabase()->query("SELECT * FROM ".self::getTable(). " WHERE end_date IS NULL",get_called_class());
   }

   public static function allByPage($itemsPerPage, $offset, $orderCol = false, $order = 'ASC')
   {  $sql = "SELECT * FROM ".self::getTable() . " WHERE end_date IS NULL";
      if ($orderCol)
      {  $sql .= " ORDER BY ".$orderCol." ".$order;
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
