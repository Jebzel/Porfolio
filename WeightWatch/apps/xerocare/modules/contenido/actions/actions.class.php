<?php

/**
 * home actions.
 *
 * @package    galeno
 * @subpackage home
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class contenidoActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
        $this->getRequest()->setAttribute('pg', 2);
       // throw new sfException("Exception");
  }
  public function executeInicio(sfWebRequest $request)
  {
   
  }
  public function executeConstruccion(sfWebRequest $request)
  {

  }
  public function executeConsejo(sfWebRequest $request)
  {

  }
  public function executeCorrecto(sfWebRequest $request)
  {

  }
  public function executeEjercicio(sfWebRequest $request)
  {

  }
      public function executeError500(sfWebRequest $request)
  {

  }
     public function executeError404(sfWebRequest $request)
  {

  }
}