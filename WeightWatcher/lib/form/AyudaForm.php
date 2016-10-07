<?php
class AyudaForm extends sfForm
{
    public function configure()
   {
        $this->setWidgets(array(
            'query' => new sfWidgetFormInput(),
         ));
  }
}
?>
