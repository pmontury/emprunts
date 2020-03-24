<?php

namespace App\Controller;

use App\Weblitzer\Controller;
use App\Model\EmpruntsModel;
use App\Model\AbonnesModel;
use App\Model\ProductsModel;
use App\Model\CategoriesModel;

/**
 *
 */
class DefaultController extends Controller
{

   public function index()
   {
      $message = 'Bienvenue dans les emprunts';

      $stats = array();
      $stats['nb_abonnes'] = AbonnesModel::count();
      $stats['nb_products'] = ProductsModel::count();
      $stats['nb_cats'] = CategoriesModel::count();
      $stats['nb_emprunts_tot'] = EmpruntsModel::count();
      $stats['nb_emprunts_encours'] = EmpruntsModel::countEnCours();

      $this->render('app.default.frontpage',array(
            'message' => $message,
            'stats'     => $stats,
         ));
   }

    /**
     *
     */
    public function Page404()
    {
        $this->render('app.default.404');
    }

}
