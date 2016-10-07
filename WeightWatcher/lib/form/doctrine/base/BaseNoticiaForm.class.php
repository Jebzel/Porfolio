<?php

/**
 * Noticia form base class.
 *
 * @method Noticia getObject() Returns the current form's model object
 *
 * @package    galeno
 * @subpackage form
 * @author     Enimados
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseNoticiaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'titulo'      => new sfWidgetFormInputText(),
      'descripcion' => new sfWidgetFormTextarea(),
      'ubicacion'   => new sfWidgetFormInputText(),
      'status'      => new sfWidgetFormInputText(),
      'fecha_reg'   => new sfWidgetFormDateTime(),
      'fecha_fin'   => new sfWidgetFormDateTime(),
      'img1'        => new sfWidgetFormInputText(),
      'img2'        => new sfWidgetFormInputText(),
      'img3'        => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'titulo'      => new sfValidatorString(array('max_length' => 45)),
      'descripcion' => new sfValidatorString(),
      'ubicacion'   => new sfValidatorString(array('max_length' => 120, 'required' => false)),
      'status'      => new sfValidatorInteger(),
      'fecha_reg'   => new sfValidatorDateTime(),
      'fecha_fin'   => new sfValidatorDateTime(),
      'img1'        => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'img2'        => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'img3'        => new sfValidatorString(array('max_length' => 45, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('noticia[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Noticia';
  }

}
