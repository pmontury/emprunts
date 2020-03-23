<?php

namespace App\Controller;

use App\Weblitzer\Controller;
use App\Weblitzer\View;
use App\Model\ProductsModel;
use App\Service\Form;
use App\Service\Validation;

use JasonGrimes\Paginator;

/**
 *
 */
class ProductsController extends Controller
{  private $product;
   private $errors = array();
   private $post = array();

   public function liste($page)
   {
      $view = new View();
      $titre = 'Liste des produits';

      $totalItems =  ProductsModel::count();
      $itemsPerPage = 2;
      $currentPage = 1;
      $offset = 0;
      $currentPage = $page;
      $offset = ($currentPage - 1) * $itemsPerPage;
      $urlPattern = $view->path('listeproducts') . '/(:num)/';
      $paginator = new Paginator($totalItems, $itemsPerPage, $currentPage, $urlPattern);

      $products = ProductsModel::allByPage($itemsPerPage, $offset, 'titre');

      $this->render('app.products.liste',array(
         'titre' => $titre,
         'products' => $products,
         'paginator' => $paginator,
      ));
   }

   public function detail($id)
   {  $titre = 'Detail produit';
      $this->getProduct($id);

      $this->render('app.products.detail',array(
         'titre' => $titre,
         'product' => $this->product
      ));
   }

   public function add()
   {  $titre = 'Ajouter un produit';

      if ($this->validData($this->errors))
      {  ProductsModel::insert($this->post);
         $this->redirect('listeproducts',array(1));
      }

      $form = new Form($this->errors);

      $this->render('app.products.add',array(
         'titre' => $titre,
         'form' => $form
      ));
   }

   public function update($id)
   {  $titre = 'Editer un produit';
      $this->getProduct($id);

      if ($this->validData($this->errors))
      {  ProductsModel::update($this->product->id, $this->post);
         $this->redirect('listeproducts',array(1));
      }

      $form = new Form($this->errors);

      $this->render('app.products.update',array(
         'titre'     => $titre,
         'form'      => $form,
         'product'   => $this->product
      ));
   }

   public function delete($id)
   {  $this->getProduct($id);
      ProductsModel::delete($this->product->id);
      $this->redirect('listeproducts',array(1));
   }

   private function getProduct($id)
   {  if (empty($this->product = ProductsModel::findById($id)))
      {  $this->Abort404();
      }
   }

   private function validData($post)
   {  if(!empty($_POST['submitted']))
      {  $this->post = $this->cleanXss($_POST);
         $validation = new Validation();

         $this->errors['titre'] = $validation->textValid($this->post['titre'], 'Titre');
         $this->errors['reference'] = $validation->textValid($this->post['reference'], 'Référence');
         $this->errors['description'] = $validation->textValid($this->post['description'], 'Description', 10, 1000);

         if($validation->IsValid($this->errors))
         {  return true;
         }
      }
      return false;
   }

}
