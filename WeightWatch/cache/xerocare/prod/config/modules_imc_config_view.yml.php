<?php
// auto-generated by sfViewConfigHandler
// date: 2010/09/28 09:22:30
$response = $this->context->getResponse();


  $templateName = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_template', $this->actionName);
  $this->setTemplate($templateName.$this->viewName.$this->getExtension());



  if (null !== $layout = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_layout'))
  {
    $this->setDecoratorTemplate(false === $layout ? false : $layout.$this->getExtension());
  }
  else if (null === $this->getDecoratorTemplate() && !$this->context->getRequest()->isXmlHttpRequest())
  {
    $this->setDecoratorTemplate('' == 'layout2' ? false : 'layout2'.$this->getExtension());
  }
  $response->addHttpMeta('content-type', 'text/html', false);
  $response->addMeta('title', 'Programa Xerocare', false, false);
  $response->addMeta('description', 'Programa Xerocare en Venezuela', false, false);
  $response->addMeta('keywords', 'Xerocare, Galeno, Venezuela, nutricion, imc, calculo imc, xerograx, xerogras, obesidad, obeso, dieta, ejercicio, orlistat, reduccion, absorcion, grasa, rebajar, kilo, gramo, indice de masa corporal', false, false);
  $response->addMeta('language', 'es', false, false);
  $response->addMeta('robots', 'index, follow', false, false);

  $response->addStylesheet('style.css', '', array ());
  $response->addStylesheet('menu_top.css', '', array ());
  $response->addJavascript('jquery.js', '', array ());


