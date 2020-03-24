<?php

namespace App\Controller;

use App\Weblitzer\Controller;
use App\Weblitzer\View;

use App\Model\CategoriesModel;

use App\Service\Form;
use App\Service\Validation;

use JasonGrimes\Paginator;

/**
 *
 */
class CategoriesController extends Controller
{
   private $emprunt;
   private $errors = array();
   private $post = array();

   public function liste($page)
   {
      $view = new View();
      $titre = 'Liste des catégories';

      $totalItems =  CategoriesModel::count();
      $itemsPerPage = 2;
      $currentPage = 1;
      $offset = 0;
      $currentPage = $page;
      $offset = ($currentPage - 1) * $itemsPerPage;
      $urlPattern = $view->path('listecats') . '/(:num)/';
      $paginator = new Paginator($totalItems, $itemsPerPage, $currentPage, $urlPattern);

      $categories = CategoriesModel::allByPage($itemsPerPage, $offset, 'nom');

      if ($this->validData()) {
         CategoriesModel::insert($this->post);
         $this->redirect('listecats',array($page));
      }

      $form = new Form($this->errors);

      $this->render('app.categories.liste',array(
         'titre'        => $titre,
         'form'         => $form,
         'categories'   => $categories,
         'paginator'    => $paginator,
      ));
   }

   private function validData()
   {
      if (!empty($_POST['submitted'])) {
         $this->post = $this->cleanXss($_POST);

         $validation = new Validation;

         $this->errors['categorie'] = $validation->textValid($this->post['categorie'], 'categorie');

         if($validation->IsValid($this->errors)) {
            return true;
         }
      }
      return false;
   }

}
