<?php

/**
 * Regular form.
 *
 * @package    galeno
 * @subpackage form
 * @author     Enimados
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class RegularForm extends BaseRegularForm
{
  public function configure()
  {   
      unset($this['id'], $this['status']);


    $this->widgetSchema['ubicacion'] =  new sfWidgetFormGMapAddress();

    $this->widgetSchema->setHelp('ubicacion', 'Indique una ubicación de su preferencia.');
    $this->widgetSchema->setHelp('notificacion', 'Marque esta casilla si desea recibir notificación por correo sobre nuestro producto.');

    $this->setValidators(array(
        'ubicacion'=> new sfValidatorString(array('required' => false, 'max_length' => 200,'min_length' => 4), array('required'=> 'La ubicación es requerida.','min_length'=> 'Número de dígitos no valido.','max_length'=> 'Número de dígitos no valido.')),
        'notificacion'=>new sfValidatorBoolean(),
     ));

   $this->widgetSchema->setLabels(array(
     'ubicacion'    => 'Ubicación',
     'notificacion'    => 'Notificación',));

  }
}
