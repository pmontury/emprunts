<?php

$routes = array(
   array('home','default','index'),

   array('liste','abonnes','liste'),
   array('add','abonnes','add'),
   array('detail','abonnes','detail',array('id')),
   array('update','abonnes','update',array('id')),
   array('delete','abonnes','delete',array('id')),

   array('listeproducts','products','liste'),
   array('addproducts','products','add'),
   array('detailproducts','products','detail',array('id')),
   array('updateproducts','products','update',array('id')),
   array('deleteproducts','products','delete',array('id')),

   array('listeemprunts','emprunts','liste'),

);
