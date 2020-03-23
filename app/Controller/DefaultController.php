<?php

namespace App\Controller;

use App\Weblitzer\Controller;
use App\Model\EmpruntsModel;
use App\Model\AbonnesModel;
use App\Model\ProductsModel;

/**
 *
 */
class DefaultController extends Controller
{

   public function index()
   {
      $message = 'Bienvenue dans les emprunts';

      $stats = array();
      $stats[] = AbonnesModel::count();
      $stats[] = ProductsModel::count();
      $stats[] = EmpruntsModel::count();
      $stats[] = EmpruntsModel::countEnCours();

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
