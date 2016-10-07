<?php

/**
 * Medico form base class.
 *
 * @method Medico getObject() Returns the current form's model object
 *
 * @package    galeno
 * @subpackage form
 * @author     Enimados
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseMedicoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'usuario_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Usuario'), 'add_empty' => false)),
      'ubicacion'    => new sfWidgetFormInputText(),
      'notificacion' => new sfWidgetFormInputCheckbox(),
      'especialidad' => new sfWidgetFormInputText(),
      'consultorio'  => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'usuario_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Usuario'))),
      'ubicacion'    => new sfValidatorString(array('max_length' => 120, 'required' => false)),
      'notificacion' => new sfValidatorBoolean(),
      'especialidad' => new sfValidatorString(array('max_length' => 45)),
      'consultorio'  => new sfValidatorString(array('max_length' => 45)),
    ));

    $this->widgetSchema->setNameFormat('medico[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Medico';
  }

}
