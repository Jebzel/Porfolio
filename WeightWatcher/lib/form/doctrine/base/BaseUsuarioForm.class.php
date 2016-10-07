<?php

/**
 * Usuario form base class.
 *
 * @method Usuario getObject() Returns the current form's model object
 *
 * @package    galeno
 * @subpackage form
 * @author     Enimados
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseUsuarioForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'cedula'       => new sfWidgetFormInputText(),
      'usuario'      => new sfWidgetFormInputText(),
      'nombre'       => new sfWidgetFormInputText(),
      'apellido'     => new sfWidgetFormInputText(),
      'clave'        => new sfWidgetFormInputText(),
      'mail'         => new sfWidgetFormInputText(),
      'tipo_id'      => new sfWidgetFormInputText(),
      'status'       => new sfWidgetFormInputCheckbox(),
      'ubicacion'    => new sfWidgetFormInputText(),
      'notificacion' => new sfWidgetFormInputCheckbox(),
      'especialidad' => new sfWidgetFormInputText(),
      'consultorio'  => new sfWidgetFormInputText(),
      'last_login'   => new sfWidgetFormDateTime(),
      'created_at'   => new sfWidgetFormDateTime(),
      'updated_at'   => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'cedula'       => new sfValidatorString(array('max_length' => 9, 'required' => false)),
      'usuario'      => new sfValidatorString(array('max_length' => 30)),
      'nombre'       => new sfValidatorString(array('max_length' => 30)),
      'apellido'     => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'clave'        => new sfValidatorString(array('max_length' => 50)),
      'mail'         => new sfValidatorString(array('max_length' => 45)),
      'tipo_id'      => new sfValidatorInteger(array('required' => false)),
      'status'       => new sfValidatorBoolean(array('required' => false)),
      'ubicacion'    => new sfValidatorString(array('max_length' => 120, 'required' => false)),
      'notificacion' => new sfValidatorBoolean(),
      'especialidad' => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'consultorio'  => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'last_login'   => new sfValidatorDateTime(array('required' => false)),
      'created_at'   => new sfValidatorDateTime(array('required' => false)),
      'updated_at'   => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('usuario[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Usuario';
  }

}
