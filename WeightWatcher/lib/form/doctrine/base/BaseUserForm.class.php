<?php

/**
 * User form base class.
 *
 * @method User getObject() Returns the current form's model object
 *
 * @package    galeno
 * @subpackage form
 * @author     Enimados
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseUserForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'cedula'     => new sfWidgetFormInputText(),
      'usuario'    => new sfWidgetFormInputText(),
      'nombre'     => new sfWidgetFormInputText(),
      'apellido'   => new sfWidgetFormInputText(),
      'clave'      => new sfWidgetFormInputText(),
      'mail'       => new sfWidgetFormInputText(),
      'tipo_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Tipo'), 'add_empty' => false)),
      'status'     => new sfWidgetFormInputCheckbox(),
      'last_login' => new sfWidgetFormDateTime(),
      'created_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'cedula'     => new sfValidatorString(array('max_length' => 9, 'required' => false)),
      'usuario'    => new sfValidatorString(array('max_length' => 30)),
      'nombre'     => new sfValidatorString(array('max_length' => 30)),
      'apellido'   => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'clave'      => new sfValidatorString(array('max_length' => 20)),
      'mail'       => new sfValidatorString(array('max_length' => 45)),
      'tipo_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Tipo'))),
      'status'     => new sfValidatorBoolean(array('required' => false)),
      'last_login' => new sfValidatorDateTime(array('required' => false)),
      'created_at' => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('user[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'User';
  }

}
