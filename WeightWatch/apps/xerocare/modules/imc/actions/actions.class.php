<?php

/**
 * imc actions.
 *
 * @package    galeno
 * @subpackage imc
 * @author     Enimados
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class imcActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
      $this->form = new CalcImcForm();
  }

  public function executeProImc(sfWebRequest $request)
  {

   /* $q = Doctrine_Query::create()
    ->from('imc u')
    ->where('u.id = ?', $usr);

      $users = $q->execute();
     foreach ($users as $user)
      {
            $user
      }*/

    $peso=floatval($request->getPostParameter('peso').".".$request->getPostParameter('gramo'));
    $estatura=floatval($request->getPostParameter('estatura').".".$request->getPostParameter('centimetro'));
    $estatura=$estatura * $estatura;
     $imc = $peso/$estatura;
     $imc =round($imc,2);
     if ($imc<=18.0) $tipo='Por debajo de lo normal';
     elseif ($imc>=18.1 && $imc<=24.9) $this->tipo=1;
     elseif ($imc>=25 && $imc<=29.9) $this->tipo=2;
     elseif ($imc>=30 && $imc<=34.9) $this->tipo=3;
     elseif ($imc>=35 && $imc<=39.9) $this->tipo=4;
     elseif ($imc>=40) $this->tipo=5;
     //echo  " estura ".$imc ;exit();
     $this->redirect('/imc?est='.$request->getPostParameter('estatura').'&peso='.$request->getPostParameter('peso').'&gr='.$request->getPostParameter('gramo').'&cm='.$request->getPostParameter('centimetro').'&tipo='.$this->tipo.'&imc='.$imc);
    // $this->forward ('imc', 'index');
    
    // echo "longitud ". $arrayR['ubicacion']['longitude']." latitud ". $arrayR['ubicacion']['latitude'];
    // $arrayR['imc']= $arrayR['ubicacion']['address'];
    // $request->SetParameter('usuarios',$arrayR);*/
  }
}
