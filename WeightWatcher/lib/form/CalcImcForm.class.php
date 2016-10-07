<?php
class CalcImcForm extends sfForm
{
    public function configure()
   {
       $estatura = array();
       $peso = array();
       $mes = array();
       $gramo = array();

    for ($i=0;$i<=99;$i++)
       $estatura[$i] = $i;

    for ($i=40;$i<=180;$i++)
       $peso[$i] = $i;
    
    for ($i=0;$i<=11;$i++)    
        $mes[$i] = $i;
    
    for ($i=0;$i<=9;$i++)
        $gramo[$i] = $i*100;
    
       $sexo = array("F"=>"Femenino","M"=>"Masculino");
     $contextura = array("D"=>"Delgada","N"=>"Normal","R"=>"Robusta");
    $this->setWidgets(array(
      /*'edad'       => new sfWidgetFormChoice(array( "choices" => $edad,'default' => 15)),
      'peso'       => new sfWidgetFormChoice(array( "choices" => $peso,'default' => 15)),
      'sexo'       => new sfWidgetFormChoise(array('multiple' => true, 'expanded' => true)),
      'contextura' => new sfWidgetFormChoise(array('multiple' => true, 'expanded' => true)),*/

     'estatura' => new sfWidgetFormChoice(array( "choices" => array("1"=>"1","2"=>"2"),'default' =>0)),
      'centimetro' => new sfWidgetFormChoice(array( "choices" => $estatura,'default' => 50)),
      'mes' => new sfWidgetFormChoice(array( "choices" => $mes,'default' => 0)),
      'peso'       => new sfWidgetFormChoice(array( "choices" => $peso,'default' => 50)),
      'gramo'       => new sfWidgetFormChoice(array( "choices" => $gramo,'default' => 0)),
      'sexo'       => new sfWidgetFormChoice(array( "choices" => $sexo,'default' => 1)),
      'contextura'   => new sfWidgetFormChoice(array( "choices" => $contextura,'default' => 1)),
    ));
  }
}
?>
