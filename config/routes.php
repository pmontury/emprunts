<?php

$routes = array(
   array('home','default','index'),

   array('liste','abonnes','liste',array('page')),
   array('add','abonnes','add'),
   array('detail','abonnes','detail',array('id')),
   array('update','abonnes','update',array('id')),
   array('delete','abonnes','delete',array('id')),

   array('listeproducts','products','liste',array('page')),
   array('addproducts','products','add'),
   array('detailproducts','products','detail',array('id')),
   array('updateproducts','products','update',array('id')),
   array('deleteproducts','products','delete',array('id')),

   array('listeemprunts','emprunts','liste',array('page')),
   array('updateemprunts','emprunts','update',array('id')),

   array('listecats','categories','liste',array('page')),
   array('addcats','categories','add'),

);
