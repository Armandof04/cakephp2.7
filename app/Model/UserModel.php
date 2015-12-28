<?php
class User extends AppModel {
       var $name = 'User';
 
   public $validate = array(
   		'name' = array(
   				'rule'= 'notEmpty',
   				'required' = true,
   				'message' = "Escriba un nombre valido"
   			),
   		'last_name' = array(
   				'rule'= 'notEmpty',
   				'required' = true,
   				'message' = "Escriba un apellido valido valido"
   			),

   	);
}