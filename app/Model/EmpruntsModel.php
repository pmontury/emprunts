<?php /* app/Model/AbonnesModel.php */

namespace App\Model;

use App\App;

class EmpruntsModel extends \App\Weblitzer\Model
{
   protected static $table = 'emprunts';

   public static function insert($post)
   {  App::getDatabase()->prepareInsert("INSERT INTO " . self::getTable() .
                                       " (titre, reference, description) VALUES (?,?,?) ",
                                       [$post['titre'],$post['reference'],$post['description']]);
   }

   public static function update($id, $post)
   {  App::getDatabase()->prepareInsert("UPDATE " . self::getTable() .
                                       " SET titre = ?, reference = ?, description = ? WHERE id = ? ",
                                       [$post['titre'],$post['reference'],$post['description'], $id]);
   }

}
