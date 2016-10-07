<?php

/**
 * usuario actions.
 *
 * @package    galeno
 * @subpackage usuario
 * @author     Enimados
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class usuarioActions extends sfActions
{
    public function executePreLogin()
{
    //echo "f: ".$this->request->getReferer();exit();
    if ($this->getRequest()->getMethod() != sfRequest::POST) {
        sfView::SUCCESS;
    }
    else
    {
        $usr  =  $this->getRequestParameter('usuario');
        $pwd  =  $this->getRequestParameter('clave');

       // $pwd = md5($pwd);

        $q = Doctrine_Query::create()
    ->from('Usuario u')
    ->where('u.clave = ?', $pwd)
    ->where('u.usuario = ?', $usr);

      $users = $q->execute();

     if ($users->count()==1){
          foreach ($users as $user)
          {
                $this->asignacion($user);
          }

     }
        else
        {

           $this->getUser()->setFlash('error', 'Usuario/Contraseña incorrectas. Intenta de nuevo');
           // $this->getRequest()->setError('userName', 'The user Name field cannot be left blank');

           // $this->forward ('main', 'login');
        }
    }
       $this->redirect ($this->request->getReferer());
 //  return sfView::SUCCESS;
}
 private function asignacion($user)
 {

    $this->getUser()->setFlash('notice', 'Login exitoso.');
    $this->getUser()->setAuthenticated(true);
    $this->getUser()->setAttribute("logeado", true);
    $this->getUser()->setAttribute("nombre", $user->getNombre());
    $this->getUser()->setAttribute("apellido", $user->getApellido());
    $this->getUser()->setAttribute("id", $user->getId());

 }



  public function executeOutLogin() {
      $this->getUser()->setFlash('notice', 'Salida exitosa.');
         $this->getUser()->setAuthenticated(false);
        $this->getUser()->setAttribute("logeado", false);
        $this->getUser()->setAttribute("nombre", "");
        $this->getUser()->setAttribute("apellido", "");
        $this->getUser()->setAttribute("id", "");
        $this->redirect('@homepage');
  }

  public function executeIndex(sfWebRequest $request)
  {
    $this->usuarios = Doctrine::getTable('Usuario')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->usuario = Doctrine::getTable('Usuario')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->usuario);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new UsuarioForm();
  }
  

  public function executeCreate(sfWebRequest $request)
  {
        $this->forward404Unless($request->isMethod(sfRequest::POST));
        //$this->form = new usuarioForm();
        $this->form = new usuarioForm();
        $arrayR=$request->getParameter('usuario');
        $clave = trim(strtolower($request->getParameter('clave')));
        $clave2 = trim(strtolower($request->getParameter('clave2')));
        $this->existe=0;
        $this->existeC=0;
        $this->existeU=0;
        $this->address=$arrayR['ubicacion']['address'];
       // echo  "address '".$this->address ."'";
        $ma = trim(strtolower($arrayR['mail']));
        $us = trim(strtolower($arrayR['usuario']));
        if ($arrayR['mail']!= '' && $arrayR['mail']!= ' ')
        {
            $q = Doctrine_Query::create()
                ->from('Usuario u')
                ->where('LOWER(u.mail) = ?', $ma);
               // ->orWhere('LOWER(u.usuario) = ?', $us);
            $users = $q->execute();
             if ($users->count()>=1) $this->existe=1;
        }
        if ($arrayR['usuario']!= '' && $arrayR['usuario']!= ' ')
        {
            $q = Doctrine_Query::create()
                ->from('Usuario u')
                ->Where('LOWER(u.usuario) = ?', $us);
            $users = $q->execute();
             if ($users->count()>=1) $this->existeU=1;
        }
        if ($clave2==$clave)
        {
            $this->existeC=1;
        }
        $this->processForm($request, $this->form);
        $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($usuario = Doctrine::getTable('Usuario')->find(array($request->getParameter('id'))), sprintf('Objecto usuario no existe (%s).', $request->getParameter('id')));
    $this->form = new usuarioForm($usuario);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($usuario = Doctrine::getTable('Usuario')->find(array($request->getParameter('id'))), sprintf('Objecto usuario no existe (%s).', $request->getParameter('id')));
    $this->form = new usuarioForm($usuario);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($usuario = Doctrine::getTable('Usuario')->find(array($request->getParameter('id'))), sprintf('Objecto usuario no existe (%s).', $request->getParameter('id')));
    $usuario->delete();

    $this->redirect('usuario/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
     $arrayR=$request->getParameter('usuario');
     $arrayR['ubicacion']= $arrayR['ubicacion']['address'];
     $request->SetParameter('usuario',$arrayR);


     $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
     if ($form->isValid())
      {
        $usuarios = $form->save();
         //$usuarios = $form->saveEmbeddedForms();
        $this->redirect('usuario/bienvenido?id='.$usuarios->getId());
      }
  }
   public function executeBienvenido(sfWebRequest $request)
  {
    $this->forward404Unless($usuarios = Doctrine::getTable('Usuario')->find(array($request->getParameter('id'))), sprintf('Objecto usuario no existe (%s).', $request->getParameter('id')));
    $this->asignacion($usuarios);
    $this->usuarios = $usuarios;
  }
}