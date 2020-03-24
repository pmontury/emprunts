<?php /* app/Model/AbonnesModel.php */

namespace App\Model;

use App\App;

class ProductsModel extends \App\Weblitzer\Model
{
   protected static $table = 'products';

   public static function allByPageJoint($itemsPerPage, $offset, $orderCol = false, $order = 'ASC')
   {
      $sql = "SELECT pro.id, pro.titre, pro.reference, pro.description, cat.nom FROM " . self::getTable() . " AS pro ";
      $sql .= "LEFT JOIN " . CategoriesModel::getTable() . " AS cat ON pro.id_categorie = cat.id ";
      if ($orderCol) {
         $sql .= "ORDER BY ".$orderCol." ".$order;
      }
      $sql .= " LIMIT ".$itemsPerPage." OFFSET ".$offset;

      return App::getDatabase()->query($sql, get_called_class());
   }

   public static function insert($post)
   {
      App::getDatabase()->prepareInsert("INSERT INTO " . self::getTable() .
                                       " (titre, reference, description, id_categorie) VALUES (?,?,?,?) ",
                                       [$post['titre'],$post['reference'],$post['description'],$post['categorie']]);
   }

   public static function update($id, $post)
   {
      App::getDatabase()->prepareInsert("UPDATE " . self::getTable() .
                                       " SET titre = ?, reference = ?, description = ?, id_categorie = ? WHERE id = ? ",
                                       [$post['titre'],$post['reference'],$post['description'], $post['categorie'], $id]);
   }

}
