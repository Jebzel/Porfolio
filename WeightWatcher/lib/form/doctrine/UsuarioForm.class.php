<?php

/**
 * Usuario form.
 *
 * @package    galeno
 * @subpackage form
 * @author     Enimados
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class UsuarioForm extends BaseUsuarioForm
{
  public function configure()
  {
    unset($this['id'], $this['status'],$this['created_at'],$this['updated_at'], $this['last_login']);
     $this->setDefault('status', '1');
    $this->setDefault('notificacion', '1');
    $this->widgetSchema['clave'] = new sfWidgetFormInputPassword();
     $this->widgetSchema['ubicacion'] =  new sfWidgetFormGMapAddress();
    $this->widgetSchema->setHelp('ubicacion', 'Indique una ubicación de su preferencia.');
    $this->widgetSchema->setHelp('notificacion', 'Marque esta casilla si desea recibir notificación por correo sobre nuestro producto.');

    $this->validatorSchema->setOption('allow_extra_fields', true);

    $this->setValidators(array(

     'clave'=>   new sfValidatorString(array('required' => true, 'max_length' => 20,'min_length' => 4), array('required'=> 'La contraseña es requerida.','min_length'=> 'Número de dígitos no valido(mínimo 4).','max_length'=> 'Número de dígitos no valido(máximo 20).')),
     'cedula'=>  new sfValidatorNumber(array('required' => false, 'max' => 99999999,'min' => 1000000), array('required'=> 'La cédula es requerida.','min'=> 'Cédula no valida.','max'=> 'Cédula no valida.','invalid'=>'Formato invalido')),
    'usuario'=>  new sfValidatorString(array('required' => true, 'max_length' => 20,'min_length' => 4), array('required'=> 'El nombre de usuario es requerido.','min_length'=> 'Número de dígitos no valido(mínimo 4).','max_length'=> 'Número de dígitos no valido(máximo 20).')),
    'nombre'=>  new sfValidatorString(array('required' => true, 'max_length' => 30,'min_length' => 4), array('required'=> 'El nombre es requerido.','min_length'=> 'Número de dígitos no valido(mínimo 4).','max_length'=> 'Número de dígitos no valido(máximo 30).')),
    'ubicacion'=> new sfValidatorString(array('required' => false, 'max_length' => 200,'min_length' => 6), array('required'=> 'La ubicación es requerida.','min_length'=> 'Número de dígitos no valido.','max_length'=> 'Número de dígitos no valido.')),
    'notificacion'=>new sfValidatorBoolean(),
    'apellido'=>new sfValidatorString(array('required' => false, 'max_length' => 45,'min_length' => 4), array('required'=> 'El apellido es requerido.','min_length'=> 'Número de dígitos no valido(mínimo 4).','max_length'=> 'Número de dígitos no valido(máximo 45).')),
    'mail'  =>  new sfValidatorEmail(array(), array('invalid' => 'Formato invalido de correo','required'=> 'El e-mail es requerido.')),
    /*$this->validatorSchema->setPostValidator(new sfValidatorAnd(array(
        new sfValidatorDoctrineUnique(array('model' => 'usuario', 'column' => array('mail')), array('invalid' => 'Ya existe ese correo.')),
        new sfValidatorSchemaCompare('clave', '==', 'clave2', array('throw_global_error' => true), array('invalid' => 'No corresponden las contraseñas'))))),*/
        ));

   $this->widgetSchema->setLabels(array(
     'mail'    => 'E-Mail',
     'clave'    => 'Contraseña',
     'ubicacion'    => 'Ubicación',
     'notificacion'    => 'Notificación',));
    }

}