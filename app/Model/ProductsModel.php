<?php /* app/Model/AbonnesModel.php */

namespace App\Model;

use App\App;

class ProductsModel extends \App\Weblitzer\Model
{
   protected static $table = 'products';

   public static function allByPage($itemsPerPage, $offset, $orderCol = false, $order = 'ASC')
   {
      $sql = "SELECT * FROM ".self::getTable();
      if ($orderCol) {
         $sql .= " ORDER BY ".$orderCol." ".$order;
      }
      $sql .= " LIMIT ".$itemsPerPage." OFFSET ".$offset;

      return App::getDatabase()->query($sql, get_called_class());
   }

   public static function insert($post)
   {
      App::getDatabase()->prepareInsert("INSERT INTO " . self::getTable() .
                                       " (titre, reference, description) VALUES (?,?,?) ",
                                       [$post['titre'],$post['reference'],$post['description']]);
   }

   public static function update($id, $post)
   {
      App::getDatabase()->prepareInsert("UPDATE " . self::getTable() .
                                       " SET titre = ?, reference = ?, description = ? WHERE id = ? ",
                                       [$post['titre'],$post['reference'],$post['description'], $id]);
   }

}
