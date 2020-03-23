<?php

namespace App\Controller;

use App\Weblitzer\Controller;
use App\Model\EmpruntsModel;
use App\Model\AbonnesModel;
use App\Model\ProductsModel;
use App\Service\Form;
use App\Service\Validation;

/**
 *
 */
class EmpruntsController extends Controller
{  private $emprunt;
   private $errors = array();
   private $post = array();

   public function liste()
   {  $titre = 'Liste des emprunts';
      $emprunts = EmpruntsModel::all();
      $abonnes = AbonnesModel::all();
      $products = ProductsModel::all();



      $form = new Form($this->errors);

      $this->render('app.emprunts.liste',array(
         'titre'     => $titre,
         'form'      => $form,
         'emprunts'  => $emprunts,
         'abonnes'   => $abonnes,
         'products'  => $products,
      ));
   }

   public function detail($id)
   {  $titre = 'Detail produit';
      $this->getProduct($id);

      $this->render('app.emprunts.detail',array(
         'titre' => $titre,
         'product' => $this->product
      ));
   }

   public function add()
   {  $titre = 'Ajouter un produit';

      if ($this->validData($this->errors))
      {  EmpruntsModel::insert($this->post);
         $this->redirect('listeemprunts');
      }

      $form = new Form($this->errors);

      $this->render('app.emprunts.add',array(
         'titre' => $titre,
         'form' => $form
      ));
   }

   public function update($id)
   {  $titre = 'Editer un produit';
      $this->getProduct($id);

      if ($this->validData($this->errors))
      {  EmpruntsModel::update($this->product->id, $this->post);
         $this->redirect('listeemprunts');
      }

      $form = new Form($this->errors);

      $this->render('app.emprunts.update',array(
         'titre'     => $titre,
         'form'      => $form,
         'product'   => $this->product
      ));
   }

   public function delete($id)
   {  $this->getProduct($id);
      EmpruntsModel::delete($this->product->id);
      $this->redirect('listeemprunts');
   }

   private function getProduct($id)
   {  if (empty($this->product = EmpruntsModel::findById($id)))
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
