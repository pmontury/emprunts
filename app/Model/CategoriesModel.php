<?php /* app/Model/AbonnesModel.php */

namespace App\Model;

use App\App;

class CategoriesModel extends \App\Weblitzer\Model
{
   protected static $table = 'categories';

   public static function insert($post)
   {
      App::getDatabase()->prepareInsert("INSERT INTO " . self::getTable() .
                                       " (nom, created_at) VALUES (?, NOW()) ", [$post['categorie']]);
   }

}
