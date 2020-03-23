<?php

namespace App\Controller;

use App\Weblitzer\Controller;
use App\Model\ProductsModel;
use App\Service\Form;
use App\Service\Validation;

/**
 *
 */
class ProductsController extends Controller
{  private $product;
   private $errors = array();
   private $post = array();

   public function liste()
   {  $products = ProductsModel::all();
      $titre = 'Liste des produits';

      $this->render('app.products.liste',array(
         'titre' => $titre,
         'products' => $products
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
         $this->redirect('listeproducts');
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
         $this->redirect('listeproducts');
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
      $this->redirect('listeproducts');
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
