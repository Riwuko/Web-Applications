<?php
App::uses('AppModel', 'Model');
/**
 * Employee Model
 *
 */
class Employee extends AppModel {
   var $validate = array(
   	'nazwisko'=>array('rule'=>'notBlank'),
    'etat'=>array('rule'=>'notBlank'), 
    'placa_pod'=>array('rule'=>array('range',0,2000), 
    	'message'=>'Podaj wartość od 0 do 2000'));


}
