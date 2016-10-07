<?php

/**
 * Normal filter form base class.
 *
 * @package    galeno
 * @subpackage filter
 * @author     Enimados
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseNormalFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'cedula'       => new sfWidgetFormFilterInput(),
      'usuario'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'nombre'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'apellido'     => new sfWidgetFormFilterInput(),
      'clave'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'mail'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'tipo_id'      => new sfWidgetFormFilterInput(),
      'status'       => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'ubicacion'    => new sfWidgetFormFilterInput(),
      'notificacion' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'especialidad' => new sfWidgetFormFilterInput(),
      'consultorio'  => new sfWidgetFormFilterInput(),
      'last_login'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'created_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'cedula'       => new sfValidatorPass(array('required' => false)),
      'usuario'      => new sfValidatorPass(array('required' => false)),
      'nombre'       => new sfValidatorPass(array('required' => false)),
      'apellido'     => new sfValidatorPass(array('required' => false)),
      'clave'        => new sfValidatorPass(array('required' => false)),
      'mail'         => new sfValidatorPass(array('required' => false)),
      'tipo_id'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'status'       => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'ubicacion'    => new sfValidatorPass(array('required' => false)),
      'notificacion' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'especialidad' => new sfValidatorPass(array('required' => false)),
      'consultorio'  => new sfValidatorPass(array('required' => false)),
      'last_login'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'created_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('normal_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Normal';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'cedula'       => 'Text',
      'usuario'      => 'Text',
      'nombre'       => 'Text',
      'apellido'     => 'Text',
      'clave'        => 'Text',
      'mail'         => 'Text',
      'tipo_id'      => 'Number',
      'status'       => 'Boolean',
      'ubicacion'    => 'Text',
      'notificacion' => 'Boolean',
      'especialidad' => 'Text',
      'consultorio'  => 'Text',
      'last_login'   => 'Date',
      'created_at'   => 'Date',
      'updated_at'   => 'Date',
    );
  }
}
