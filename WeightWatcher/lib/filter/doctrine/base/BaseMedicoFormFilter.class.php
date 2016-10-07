<?php

/**
 * Medico filter form base class.
 *
 * @package    galeno
 * @subpackage filter
 * @author     Enimados
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseMedicoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'usuario_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Usuario'), 'add_empty' => true)),
      'ubicacion'    => new sfWidgetFormFilterInput(),
      'notificacion' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'especialidad' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'consultorio'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'usuario_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Usuario'), 'column' => 'id')),
      'ubicacion'    => new sfValidatorPass(array('required' => false)),
      'notificacion' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'especialidad' => new sfValidatorPass(array('required' => false)),
      'consultorio'  => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('medico_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Medico';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'usuario_id'   => 'ForeignKey',
      'ubicacion'    => 'Text',
      'notificacion' => 'Boolean',
      'especialidad' => 'Text',
      'consultorio'  => 'Text',
    );
  }
}
