<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
<!-- <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php// echo $sf_user->getCulture() ?>"  lang="<?php// echo $sf_user->getCulture() ?>">-->
    <head>
        <title>
            <?php if (!include_slot('title')): ?>
                Programa Xerocare
            <?php endif; ?>
        </title>
        <link rel="shortcut icon" href="/images/xerologo.ico" />

        <?php // use_javascript('search.js');
        use_javascript('swfobject.js');
        $lay=1;
        if (!include_slot('js')): use_javascript('menu.js');
        else:  $lay=2;
        endif;?>
        <?php include_javascripts() ?>
        <?php include_stylesheets() ?>
        <script src="swfobject.js" type="text/javascript"></script>
        <script type="text/javascript">

                function putSWF(swf){
                 swfobject.embedSWF(swf, "flash", "180", "200", "10.0.0", "/images/swf/expressInstall.swf");
                }

                function cerrar()
                {
                    $('.panel').slideUp(4000).delay(800);
                    putSWF("/images/swf/c5.swf");
                    $(this).toggleClass("active");
                   // mostrar = "0";
                    return false;
                }
            $(document).ready(function(){
                $(".trigger").click(function()
                {
                    $(".panel").toggle("fast");
                    $(this).toggleClass("active");
                    <?php $cli=0;?>
                     $('#ayu1').hide();

                    putSWF("/images/swf/c1.swf");
                    return false;
                });
            });
         </script>
    </head>
    <body id="home">
       <div id="nonFooter">
            <div id="header-wrap">
                    <?php if ($lay==1): ?>
                        <ul id="navigation">
                           <li class="home"><a title="Inicio" href="<?php echo url_for('@homepage') ?>"></a></li>
                          <!-- <li class="about"><a title="Geolocalización" href="<?php //echo url_for('@construccion') ?>"></a></li>-->
                           <li class="search trigger">  <a id="a" href="#"></a></li>
                           <li class="photos"><a title="Sección para Médicos" href="<?php// echo url_for('@construccion') ?>"></a></li>
                           <li class="rssfeed"><a title="Noticias y Eventos" href="<?php //echo url_for('@construccion') ?>"></a></li>
                           <li class="podcasts"><a title="IMC" href="<?php //echo url_for('@imc') ?>"></a></li>
                        </ul>
                    <div class="panel" align="right">
                        <input class="btnImg" type="image" src="/images/icons/cancel.png" onClick="cerrar()" alt="cancelar"/>
                        <table width="100%" align="left" cellpadding="0" cellspacing="o">
                            <tr>
                                <td align="center" colspan="2">
                                    <div id="flash">
                                        <table align="center">
                                            <tr><td align="center"><h2>Descargue Flash Player para visualizar correctamente el contenido</h2></td></tr>
                                            <tr><td align="center"><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Descargue Adobe Flash player" /></a></td></tr>
                                        </table>
                                    </div>
                                </td>
                            </tr>
                            <div class="search">
                                <tr>
                                    <td colspan="2" align="center">
                                        <label id="ayu1" style="vertical-align: middle;">¿Necesita ayuda? <br>Intente con palabras claves como obesidad, nutrición, dieta,... </label>
                                    </td>
                                </tr>
                                <tr>
                                    <th colspan="2">Busqueda de contenido</th>
                                </tr>
                                <tr>
                                    <form name="search"  action="<?php //echo url_for('search') ?>" method="get">
                                      <?php $cli= $sf_request->getParameter('cli')+1; ?>
                                      <td align="right" valign="middle"><input type="text" name="query" value="<?php echo $sf_request->getParameter('query') ?>" id="search_keywords" /></td>
                                      <td align="left" valign="middle"><input type="image"  class="btnImg" src="/images/icons/control_play_blue.png"  value="search" /></td>
                                      <input type="hidden" name="cli" value="<?php  echo $cli; ?>"/>
                                         <!--<img id="loader" src="/images/loader.gif" style="vertical-align: middle; display: none" />-->
                                  </form>
                                </tr>
                            </div>
                        </table>
                    </div>
                    <?php endif; ?>
                     <table  width="100%" id="franjaTop" align="center" cellpadding="0" cellspacing="0" border="0">
                        <tr>
                            <td>
                                <?php if ($sf_user->isAuthenticated()){ ?>
                                     <table  width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                                         <tr>
                                            <td align="center">
                                                <div id="login">
                                                    <table id="tabla-sesion" border="0">
                                                      <tr><th>Bienvenido <?php echo $sf_user->getAttribute("nombre") . " " .  $sf_user->getAttribute("apellido"); ?></th></tr>
                                                      <tr><td><a href="<?php echo url_for('@outLogin') ?>">Cerrar Sesión</a></td></tr>
                                                    </table>
                                                </div>
                                            </td>
                                         </tr>
                                     </table>
                                <?php } else { ?>
                                    <form id="login" action="<?php echo url_for('@preLogin') ?>" method="post" >
                                        <table  width="100%" align="center" border="0">
                                             <tr>
                                                <td align="center">
                                                    <table id="tabla-login" align="center" border="0">
                                                        <tbody>
                                                            <tr><td>Usuario</td><td>Contraseña</td><td></td></tr>
                                                            <tr>
                                                                <td valign="middle">
                                                                    <input class="tbox" id="usuario" type="text" name="usuario" value="" title="Ingrese login de usuario registrado" />
                                                                </td>
                                                                <td valign="middle">
                                                                    <input class="tbox" id="clave" type="password" name="clave" value="" title="Ingrese clave de usuario registrado" />
                                                                </td>
                                                                <td valign="middle">
                                                                    &nbsp;&nbsp;&nbsp;<input  class="small blue awesome" id="ingreso" type="submit" name="entrar" value="Entrar" title="Ingresar"  />
                                                                </td>
                                                            </tr>
                                                            <tr><td><a href="<?php echo url_for('@usuarionuevo') ?>"> Usuario nuevo</a></td><td><a href="/usuario/new">¿Olvidó sú contraseña?</a></td><td></td></tr>
                                                        </tbody>
                                                    </table>
                                               </td>
                                             </tr>
                                        </table>
                                    </form>
                               <?php }?>
                            </td>
                        </tr>
                         <tr>
                            <td  align="center">
                                <br></br>
                            </td>
                        </tr>
                         <tr>
                             <td  align="center" valign="bottom">
                                <table  width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                                    <tr>
                                        <td align="center">
                                            <img src="/images/Xerocare.png"/>
                                         </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
            </div>
            <div id="content" class="contenedor1">
                <?php
                  function browser_info($agent=null)
                  {
                      $known = array('msie', 'firefox', 'safari', 'webkit', 'opera', 'netscape','konqueror', 'gecko');
                      $agent = strtolower($agent ? $agent : $_SERVER['HTTP_USER_AGENT']);
                      $pattern = '#(?<browser>' . join('|', $known) . ')[/ ]+(?<version>[0-9]+(?:\.[0-9]+)?)#';
                      if (!preg_match_all($pattern, $agent, $matches)) return array();
                      $i = count($matches['browser'])-1;
                      return array($matches['browser'][$i] => $matches['version'][$i]);
                  }
                    $ua = browser_info();
                    if ($sf_user->hasFlash('notice')): ?>
                        <div class="flash_notice">
                            <?php echo $sf_user->getFlash('notice') ?>
                        </div>
                    <?php endif; ?>
                    <?php if ($sf_user->hasFlash('error')): ?>
                        <div class="flash_error">
                            <?php echo $sf_user->getFlash('error') ?>
                        </div>
                    <?php endif; ?>
                    
                        <?php
                         if ((isset($ua['firefox'])  && $ua['firefox'] < 3) || (isset($ua['msie']) && $ua['msie'] < 7))
                         {
                             if (isset($ua['msie'])) $link="http://www.microsoft.com/spain/windows/internet-explorer/worldwide-sites.aspx";
                             else $link="http://www.mozilla-europe.org/es/firefox/";?>
                        <br/> <br/> <br/>
                        <div class="flash_error">
                                <?php echo "Su navegador está obsoleto, descargue el más actual en este ";?>
                                <a href="<?php echo $link ?>">link</a>
                            </div>
                    <?php }
                         else echo $sf_content ?>
                   
            </div>
        </div>
        <div id="footer">
            <table  width="100%" id="franjaDown" align="center" cellpadding="0" cellspacing="0" border="0">
             <tr>
                 <td id="altoFranjaDown">
                 </td>
             </tr>
              <tr>
                <td valign="bottom">
                    <table  width="100%" align="center" cellpadding="0" cellspacing="0" border="0" bgcolor="#8db836">
                        <tr>
                            <td align="center">
                                <table width="700px" >
                                    <tr>
                                        <td align="right">
                                             &nbsp; &copy;Galeno 2010  &nbsp; &nbsp;
                                        </td>
                                         <td align="left">
                                        </td>
                                        <td align="right">
                                            <a href="<?php echo url_for('@homepage') ?>">Inicio</a> |
                                            <a href="<?php //echo url_for('triptico') ?>">Tripticos</a> |
                                            <a href="<?php //echo url_for('@construccion') ?>">Noticias</a> |
                                            <a href="<?php //echo url_for('@construccion') ?>">Enlaces</a> |
                                            <a href="<?php //echo url_for('@construccion') ?>">Ayuda</a>
                                        </td>
                                     </tr>
                                     <tr>
                                         <td align="right">Esta página se ve mejor en: &nbsp;</td>
                                         <td align="left" valign="top"><?php echo image_tag('firefoxlogo.png', array('alt' => 'Firefox'));?><a href="http://www.firefox.com"></a></td>
                                         <td align="right"> Hecho en &nbsp;<a href="http://www.symfony.com"  ><img  src="../images/symfony.gif" alt="Symfony" border="0"/></a></td>
                                     </tr>
                                </table>
                            </td>
                        </tr>
                     </table>
                 </td>
              </tr>
          </table>
        </div>
    </body>
</html>