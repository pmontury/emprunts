<?php

namespace App\Controller;

use App\Weblitzer\Controller;
use App\Weblitzer\View;
use App\Model\EmpruntsModel;
use App\Model\AbonnesModel;
use App\Model\ProductsModel;
use App\Service\Form;
use App\Service\Validation;

use JasonGrimes\Paginator;

/**
 *
 */
class EmpruntsController extends Controller
{
   private $emprunt;
   private $errors = array();
   private $post = array();

   public function liste($page)
   {
      $view = new View();
      $titre = 'Liste des emprunts';

      $totalItems =  EmpruntsModel::countEnCours();
      $itemsPerPage = 2;
      $currentPage = 1;
      $offset = 0;
      $currentPage = $page;
      $offset = ($currentPage - 1) * $itemsPerPage;
      $urlPattern = $view->path('listeemprunts') . '/(:num)/';
      $paginator = new Paginator($totalItems, $itemsPerPage, $currentPage, $urlPattern);

      $emprunts = EmpruntsModel::allByPageJoint($itemsPerPage, $offset, 'start_date');
      $abonnes = AbonnesModel::all();
      $products = ProductsModel::all();

      if ($this->validData()) {
         EmpruntsModel::insert($this->post);
         $this->redirect('listeemprunts',array($page));
      }

      $form = new Form($this->errors);

      $this->render('app.emprunts.liste',array(
         'titre'     => $titre,
         'form'      => $form,
         'emprunts'  => $emprunts,
         'abonnes'   => $abonnes,
         'products'  => $products,
         'paginator' => $paginator,
      ));
   }

   public function update($id)
   {
      $this->getEmprunt($id);
      $this->getAbonne($this->emprunt->id_abonne);
      $this->getProduct($this->emprunt->id_product);
      EmpruntsModel::update($this->emprunt->id);
      $this->redirect('listeemprunts',array(1));
   }

   private function getEmprunt($id)
   {
      if (empty($this->emprunt = EmpruntsModel::findById($id))) {
         $this->Abort404();
      }
   }

   private function getAbonne($id)
   {
      if (empty(AbonnesModel::findById($id))) {
         $this->Abort404();
      }
   }

   private function getProduct($id)
   {
      if (empty(ProductsModel::findById($id))) {
         $this->Abort404();
      }
   }

   private function validData()
   {
      if (!empty($_POST['submitted'])) {
         $this->post = $this->cleanXss($_POST);

         if (empty($this->post['abonne'])) {
            $this->errors['abonne'] = 'Veuillez choisir un abonné';
         } else {
            $this->getAbonne($this->post['abonne']);
         }

         if (empty($this->post['produit'])) {
            $this->errors['produit'] = 'Veuillez choisir un produit';
         } else {
            $this->getProduct($this->post['produit']);
         }

         $validation = new Validation;
         if($validation->IsValid($this->errors)) {
            return true;
         }
      }
      return false;
   }

}
