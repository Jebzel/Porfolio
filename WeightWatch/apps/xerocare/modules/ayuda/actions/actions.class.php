<?php

/**
 * ayuda actions.
 *
 * @package    galeno
 * @subpackage ayuda
 * @author     Enimados
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ayudaActions extends sfActions
{
   var $anterior;
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
       $this->form = new AyudaForm();
  }

  public function executeRecuperar(sfWebRequest $request)
  {
       
  }
   public function executeIncorrecto(sfWebRequest $request)
  {
      // $this->request = $request;
  }
  public function executeSearch(sfWebRequest $request)
  {
      
      ProjectConfiguration::registerZend();
      //echo "e ".$request->getParameter('query');// exit();
      //apps/frontend/modules/job/actions/actions.class.php
      $query = $request->getParameter('query');
      /* echo "<br>sin funcion ".$query;
      echo "<br>con funcion ".$this->stripAccents($query);
      exit();*/


     // $this->executeReindex();
      $this->resultado="";
      $this->anterior= $request->getReferer();
      //$this->forwardUnless($query = $request->getParameter('query'), 'ayuda', 'incorrecto');

      //echo "query '".$query."'"; exit();
      //$this->ayuda = Doctrine_Core::getTable('Contenido')->getForLuceneQuery($query);
      $hits = array();
      $this->cli=$request->getParameter('cli');

  //echo  "fd " .$this->cli;
  if ($query=='*' || $query=='' || $query==' ')
  {
      $this->resultado="Sin resultados";
      $this->re="0";
     // echo "entro";
     
       $this->cli++;
       // $this->redirect('ayuda/search?cli='.$this->cli);
  }
  else
  {
     // echo "hola"; exit();
    $index = new Zend_Search_Lucene($this->getLuceneIndexFile());
 //  falla aqui
  $query=$this->stripAccents($query);
  $query=strtolower($query);
 $hits=$index->find($query);
    //if (!$hits)
  //echo "<br>q ".$query;
       // $hits=$index->find($query);
    // echo "d ".$request->isXmlHttpRequest();
   // if ($request->isXmlHttpRequest()) {echo "d "; exit();}
    //{
     
    if ('*' == $query || !$hits)
    {
       $this->resultado="Sin resultados";
       $this->re="0";
       
       if ($this->cli >= 3)$this->cli=0; else  $this->cli++;
        // $this->redirect('ayuda/search?cli='.$this->cli);
    }
    else
    {
       /* $this->forwardUnless($query = $request->getParameter('query'), 'home', 'index');
        $this->contenidos = Doctrine_Core::getTable('Contenidos')->getForLuceneQuery($query);*/
              //$this->executeReindex();
        //  require_once('Zend/Search/Lucene.php');   
        // $this->existeIndex();
   
       // $query = $this->getRequestParameter('query');
      //  $this->getResponse()->setTitle('Busqueda de \'' . $query . '\' « ' . sfConfig::get('app_title'), true);
      
        //echo "<br>'".$query."'";

        //$query=$query." ";
        if ($query)
        {
          //  $index = new Zend_Search_Lucene($this->getLuceneIndexFile());
          //  $hits=$index->find(strtolower($query));
            $cadD= array();
            $cadT= array();
            $cadDI=array();
            $cadPO=array();
           // echo "q ".$query;
           //echo "titulo: ".$hit->titulo;
            $i=0; $t=0;$d=0;
            foreach ($hits as $hit)
            {
              //  echo "enrtfe";
                $contnrolinea=0;
                $cadDI[$d]=$hit->direccion;
               // echo "<br>direccion ".$cadDI[$d];
                $d++;
                $hit->titulo=ucfirst(utf8_encode(strtolower(utf8_decode($hit->titulo))));
                $pos2 = strpos($hit->titulo, $query);
                $cad=utf8_encode(strtolower(utf8_decode($hit->descripcion)));
                //$cad=$hit->descripcion;
               //  echo "<br>descripcion ".$cad;
                $pos = strpos($cad, $query);
                if ($pos===0) $pos=1;
                if ($pos2===0) $pos2=1;
               // echo "<br>pos ".$pos." d ".$pos2;
                $p=0;
                if ($pos)
                {
                    $this->cli=0;
                    $cadT[$t] = $hit->titulo;
               //   echo "<br>d ".$cadT[$t];
               //   echo "<br>".$hit->descripcion;
                   // $t++;
                    $cadTotal=$cad;
                    $wh=0;$lim=100;
                    while ($wh!=2)
                    {
                        if ($wh==1)
                        {
                            $wh=2;
                            $lim=20;
                        }
                        $cad = $this->breve_descripcion($cadTotal,0,$lim);                     
                        $pos=strpos($cad, $query);                        
                         //echo "<br>pos '".$pos."'";
                         //if ($pos>0)echo "  mayor cero";
                         //else
                             if ($pos===0) $pos=1;
                       //  else echo " es vacio";
                         // echo "<br>".$cad;

                         if (($pos) && ($contnrolinea<3))
                         {                             
                             $cadD[$i]=$cad;
                             if ($i>0) $cadD[$i]= "...". $cadD[$i];
                             $cadD[$i]= $cadD[$i]."...";
                             $cadD[$i]=$this->highlight($cadD[$i], $query);
                             $contnrolinea++;
                          //  echo "<br>ta entrando ".$cadD[$i];
                             $i++;  $p++;
                         }
                         $pos=strlen($cad);
                         $cadTotal=substr($cadTotal, $pos);
                         if (strlen($cadTotal)<=20 && $wh!=2) $wh=1;

                         //echo "<br>len ".strlen($cadTotal);
                    }
                   // echo"<br>salio" ;
                    $cadPO[$t]=$p;
                    $t++;
                }
                elseif ($pos2)
                {
                     $this->cli=0;
                    $cad=$hit->titulo;
                    //echo "<br>".$cad;
                    $cad=$this->highlight($cad, $query);
              
                     $cadT[$t] = $cad; //$t++;
                     $cadPO[$t] = $p; $t++;
                     $cadD[$i] = "";$i++;
                   // $hit->descripcion="";
                }
               /* else
                {
                    //echo "sf";
                    //$hit->titulo="";
                    $cadT[$t] = ""; //$t++;
                    $cadPO[$t] = $p; $t++;
                    $cadT[$i] = ""; $i++;
                   // $hit->descripcion="";
                }*/
            }
        }
 //exit();
         $this->des = $cadD;
         $this->tit = $cadT;
         $this->dir = $cadDI;
         $this->hits = $hits;
         $this->po = $cadPO;
         $this->re="1";
        // echo count($cadT);
          if (count($cadT)==0 )
          {
              $this->resultado="Sin resultados";
              $this->re="0";
            if ($this->cli >= 3)$this->cli=0; else  $this->cli++;
          //    $this->redirect('ayuda/search?cli='.$this->cli);
          }
        }
      }
      $this->getRequest()->setAttribute('cli', $this->cli);

   // echo "<br>cli ".$this->cli;
  }



      function highlight($cadena, $arr_palabras)
      {
        //  $cadena=utf8_encode(strtolower(utf8_decode($cadena)));
        /*  if (!is_array ($arr_palabras) || empty ($arr_palabras) || !is_string ($cadena)) {
         
              return false;
          }

          $str_palabras = implode ('|', $arr_palabras);
          //echo '@\b('.$str_palabras.')\b@si';
          //echo preg_replace ('@\b('.$str_palabras.')\b@si', '<strong style="background-color:yellow">$1</strong>', $cadena);
          return preg_replace ('@\b('.$str_palabras.')\b@si', '<strong style="background-color:yellow">$1</strong>', $cadena);
     */
         return str_replace($arr_palabras,"<strong style=\"background-color:yellow\">$arr_palabras</strong>",$cadena);

       }


      function breve_descripcion($texto,$ini, $caracteres)
      {
        $cad='';
        $cTexto=strip_tags(substr($texto,$ini,$caracteres)); //obtenemos el texto desde la posición 0 un número de caracteres dado y le quitamos las etiquetas html que pueda tener
       //$cTexto=substr($texto,$ini,$caracteres);
        $esp_vacios= substr_count($cTexto,' '); //obtenemos cuantos espacios de separación entre palabras hay.
        $aPalabras = array(); //creamos el array
        $aPalabras = explode(" ",$cTexto); // extraemos en un array las palabras
        for ($i = 0; $i <$esp_vacios; $i++){
        $cad .= $aPalabras[$i].' '; //recorremos el array y lo concatenamos en $cad
        }
        return $cad;
      }

    /* private function corta_string($cadena, $numPalabras)
    {
        $resultado = $cadena ;
        if( str_word_count($cadena) > $numPalabras )
        {
            $cadena = array_splice(explode(" ", $cadena), 0, $numPalabras);
            $resultado = implode(" ", $cadena);
        }
        return $resultado;
    }
    */



    private function stripAccents($toClean) {
        $GLOBALS = array(
        'Š'=>'S', 'š'=>'s', 'Ð'=>'Dj','Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A',
        'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E', 'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I',
        'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U',
        'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss','à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a',
        'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i',
        'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 'ù'=>'u',
        'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y', 'ƒ'=>'f');
       
       // $toClean     =    trim(preg_replace('/[^\w\d_ -]/si', '', $toClean));//remove all illegal chars

        return strtr($toClean, $GLOBALS);
    }

     public function executeReindex()
    {
        //require_once ('Zend/Search/Lucene.php');
        ProjectConfiguration::registerZend();
       
        $index = new Zend_Search_Lucene($this->getLuceneIndexFile(),true);
        $q = Doctrine_Query::create()
            ->from('Contenido  u')
            ->where('u.status = 1');
         $users = $q->execute();
        foreach ($users as $user)
        {
             $titulo=$this->stripAccents($user->getTitulo());
             $descripcion=$this->stripAccents($user->getDescripcion());
             $direccion = $this->stripAccents($user->getDireccion());
            $doc = new Zend_Search_Lucene_Document();
            $doc->addField(Zend_Search_Lucene_Field::Text('id', $user->getId()));                
            $doc->addField(Zend_Search_Lucene_Field::Keyword('titulo', $titulo, 'utf-8'));
            $doc->addField(Zend_Search_Lucene_Field::Keyword('descripcion', $descripcion, 'utf-8'));
            $doc->addField(Zend_Search_Lucene_Field::Text('direccion', $direccion, 'utf-8'));
            $doc->addField(Zend_Search_Lucene_Field::Unstored('contents', " {$titulo} {$descripcion}"));
            $index->addDocument($doc);
        }
        $index->commit();
    }

    public function getLuceneIndexFile()
    {
        return sfConfig::get('sf_data_dir').'/contenido.'.sfConfig::get('sf_environment').'.index';
    }

     public function updateLuceneIndex()
    {
      $index = $this->getLuceneIndex();

      // remove an existing entry
      if ($hit == $index->find('pk:'.$this->getId()))
      {
        $index->delete($hit->id);
      }

      // don't index expired and non-activated jobs
     /* if ($this->isExpired() || !$this->getIsActivated())
      {
        return;
      }*/   
    }

    public function getLuceneIndex()
    {
      ProjectConfiguration::registerZend();

      if (file_exists($index = $this->getLuceneIndexFile()))
      {
        return Zend_Search_Lucene::open($index);
      }
      else
      {
          $this->executeReindex();
          return Zend_Search_Lucene::create($index);
      }
    }
    public function existeIndex()
    {
     // ProjectConfiguration::registerZend();
      if (!file_exists($index = $this->getLuceneIndexFile()))
      {
        
        $this->executeReindex();
       // return Zend_Search_Lucene::create($index);
      }
    }

    public function delete(Doctrine_Connection $conn = null)
    {
        ProjectConfiguration::registerZend();
        $index = $this->getLuceneIndexFile();
      if ($hit == $index->find('pk:'.$this->getId()))
      {
        $index->delete($hit->id);
      }
      return parent::delete($conn);
    }

    public function save(Doctrine_Connection $conn = null)
    {
          $conn = $conn ? $conn : ContenidosTable::getConnection();
          $conn->beginTransaction();
          try
          {
            $ret = parent::save($conn);
            $this->updateLuceneIndex();
            $conn->commit();
            return $ret;
          }
          catch (Exception $e)
          {
            $conn->rollBack();
            throw $e;
          }
    }
}