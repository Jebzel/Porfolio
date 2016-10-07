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
        include_metas();
        include_http_metas();
        use_javascript('swfobject.js');
        use_javascript('menuTop.js'); ?>
        <?php include_javascripts() ?>
        <?php include_stylesheets() ?>
        <script src="swfobject.js" type="text/javascript"></script>
        <script type="text/javascript">
                function putSWF(swf)
                {
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
                    $(".panel").slideToggle('slow', function() { });
                    //$(".panel").toggle("fast");
                    $(this).toggleClass("active");
                   
                     $('#ayu1').hide();
                    putSWF("/images/swf/c1.swf");
                    return false;
                });
                  
                  $('.letraG').click(function(){
                       var ourText = $('p');
                       var ourText2 = $('h3');
                       var ourText3 = $('a');
                       var ourText4 = $('h4');
                       var ourText5 = $('label');
                       var currFontSize = ourText.css('fontSize');
                       if (!currFontSize) currFontSize = ourText2.css('fontSize');
                       if (!currFontSize) currFontSize = ourText3.css('fontSize');
                       if (!currFontSize) currFontSize = ourText4.css('fontSize');
                       if (!currFontSize) currFontSize = ourText5.css('fontSize');
                       if (currFontSize){
                        
                           var finalNum = parseFloat(currFontSize, 10);
                           var stringEnding = currFontSize.slice(-2);
                           if(this.id == 'grande') {
                                finalNum *= 1.4;
                           }
                           else if (this.id == 'pequenyo'){
                                finalNum /=1.4;
                           }
                           ourText.animate({fontSize: finalNum + stringEnding},1000);
                           ourText2.animate({fontSize: finalNum + stringEnding},1000);
                           ourText3.animate({fontSize: finalNum + stringEnding},1000);
                           ourText4.animate({fontSize: finalNum + stringEnding},1000);
                           ourText5.animate({fontSize: finalNum + stringEnding},1000);
                       }
                  });
                  
             });
         </script>
    </head>
    <body>        
        <div class="fond">            
            <div id="principale" >
                <div id="logo" class="back-png"><a href="<?php echo url_for('@homepage'); ?>" title="Xerocare"><img src="/images/logo.png" alt="Logo"  onClick="location.href='<?php echo url_for('@homepage');?>'" /></a></div>
                <div id="vous_etes">
                     <div class="panel" align="center">
                           <table width="218px"  align="center" cellpadding="0" cellspacing="0">
                               <tr><td align="right" height="10px" colspan="2"></td></tr>
                                <tr>
                                    <td align="right" colspan="2">
                                        <input  type="image" src="/images/delete2.png" onClick="cerrar()" alt="cancelar"/>
                                    </td>
                                </tr>
                               <tr><td align="right" height="4px" colspan="2"></td></tr>
                                <tr>
                                    <td align="center" colspan="2">
                                        <div id="flash">
                                            <table align="center" cellpadding="0" cellspacing="0">
                                                <tr><td align="center"><h2>Descargue Flash Player para visualizar correctamente el contenido</h2></td></tr>
                                                <tr><td align="center"><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Descargue Adobe Flash player" /></a></td></tr>
                                            </table>
                                        </div>
                                    </td>
                                </tr>
                                <div class="search">
                                    <tr>
                                        <td colspan="2" align="center">
                                            <h6 id="ayu1" style="vertical-align: middle;">¿Necesita ayuda? <br></br> Intente con palabras claves como obesidad, nutrición, dieta,... </h6>
                                        </td>
                                    </tr>
                                    <tr><td align="right" height="4px" colspan="2"></td></tr>
                                    <tr>
                                        <th colspan="2">Búsqueda de contenido</th>
                                    </tr>
                                    <tr><td align="right" height="4px" colspan="2"></td></tr>
                                    <tr>
                                        <form name="search"  action="<?php echo url_for('search') ?>" method="get">
                                            <?php $cli = $sf_request->getAttribute('cli');?>
                                            <td align="center" colspan="2" valign="middle"><input type="text" name="query" value="<?php echo $sf_request->getParameter('query') ?>" id="search_keywords" />
                                                <input type="image"  src="/images/icons/control_play_blue.png"  value="search" />
                                                <input type="hidden" name="cli" value="<?php  echo $cli; ?>"/>
                                            </td>
                                             <!--<img id="loader" src="/images/loader.gif" style="vertical-align: middle; display: none" />-->
                                      </form>
                                    </tr>
                                </div>
                            </table>
                        </div>
                   <?php if ($sf_user->isAuthenticated()){ ?>
                         <table  width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                             <tr>
                                <td align="center">
                                    <div id="login">
                                        <table id="tabla-sesion" border="0" width="200px">
                                          <tr><th align="center">Bienvenido <?php echo $sf_user->getAttribute("nombre") . " " .  $sf_user->getAttribute("apellido"); ?></th></tr>
                                          <tr><td align="center"> <a  href="<?php echo url_for('@outLogin') ?>"><font color="white">Cerrar Sesión</font></a></td></tr>
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
                                                <tr><td align="center"><font color="#ffffff" style="font-weight: normal">Usuario</font></td><td align="center"><font color="white">Contraseña</font></td><td></td></tr>
                                                <tr>
                                                    <td valign="middle" align="center">
                                                        <input class="tbox" id="usuario" type="text" name="usuario" value="" size="14" title="Ingrese login de usuario registrado" />
                                                    </td>
                                                    <td valign="middle"  align="center">
                                                        <input class="tbox" id="clave" type="password" name="clave" value="" size="14"  title="Ingrese clave de usuario registrado" />
                                                    </td>
                                                    <td valign="middle" align="center">
                                                        <input  class="small blue awesome" id="ingreso" type="submit" name="entrar" value="Entrar" title="Ingresar"  />
                                                    </td>
                                                </tr>
                                                <tr><td align="center"><a href="<?php echo url_for('@usuarionuevo') ?>"><font color="white">Usuario nuevo</font></a></td><td align="center"><!--<a href="/usuario/new">¿Olvidó sú contraseña?</a>--></td><td></td></tr>
                                            </tbody>
                                        </table>
                                   </td>
                                 </tr>
                            </table>
                        </form>
                   <?php }?>
                </div>
                <div class="block-izquierdo">
                      <img src="/images/fondo2.png" alt="metro"/>
                </div>
                <div class="block-derecho">
                      <img src="/images/fondo2.png" alt="metro"/>
                </div>
                <?php if ($sf_request->getAttribute('pg')!=2) { ?>
                <div class="block-menu">
                    <table align="center"  width="965px" cellpadding="0" cellspacing="0">
                        <tr>
                            <td align="center">
                                <table align="center" cellpadding="0" cellspacing="0">
                                    <tr>
                                        <td>
                                            <div id="posicion1A" class="boxgridA  captionfullA">
                                               <img src="/images/boton1.png" title="Inicio"/>
                                                <div class="cover boxcaptionA">
                                                    <a href="<?php echo url_for('@homepage') ?>"><img src="/images/boton1a.png" alt="Inicio" title="Inicio" /></a>
                                                </div>
                                            </div>
                                        </td>
                                         <td>
                                            <div id="posicion2A" class="boxgridA  captionfullA">
                                               <img src="/images/boton2.png" alt="Sección Médica" title="Sección Médica"/>
                                                <div class="cover boxcaptionA">
                                                    <a href="<?php echo url_for('@construccion') ?>" ><img src="/images/boton2a.png" alt="Sección Médica" title="Sección Médica"/></a>
                                                </div>
                                            </div>
                                        </td>
                                         <td>
                                            <div id="posicion2A" class="boxgridA  captionfullA">
                                               <img src="/images/boton4.png"/>
                                                <div class="cover boxcaptionA">
                                                    <a href="<?php echo url_for('@imc') ?>" ><img src="/images/boton4a.png" alt="Cálculo IMC" title="Cálculo IMC"/></a>
                                                </div>
                                            </div>
                                        </td>
                                        <td width="270px">
                                        </td>
                                        
                                         <td>
                                            <div id="posicion2A" class="boxgridA  captionfullA">
                                                <img src="/images/boton7.png"/>
                                                <div class="cover boxcaptionA">
                                                    <a href="<?php echo url_for('triptico') ?>" ><img src="/images/boton7a.png" alt="Tripticos" title="Tripticos"/></a>
                                                </div>
                                            </div>
                                        </td>
                                         <td>
                                            <div id="posicion2A" class="boxgridA  captionfullA">
                                                <img src="/images/boton5.png"/>
                                                <div class="cover boxcaptionA">
                                                    <a href="<?php echo url_for('@construccion') ?>" ><img src="/images/boton5a.png" alt="Noticias y Eventos" title="Noticias y Eventos"/></a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div id="posicion2A" class="boxgridA  captionfullA">
                                                <img src="/images/boton3.png"/>
                                                <div class="cover boxcaptionA trigger">
                                                    <a href="<?php echo url_for('ayuda') ?>" ><img src="/images/boton3a.png" alt="Ayuda" title="Ayuda"/></a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                         </tr>
                    </table>
                </div><!--fin de block-menu-->
                <?php } ?>
                <div id="content">
                    <div id="top_content" class="back-png">
                    </div>
                    <div id="middle_content" class="back-png">
                        <table width="100%">
                            <tr>
                                <td align="center" height="65%"><img src="/images/titulo.png" alt="Titulo Xerocare" /></td>
                            </tr>
                            <tr>
                                 <td height="10px"></td>
                            </tr>
                           <?php if ($sf_request->getAttribute('pg')!=2) { ?>
                            <tr>                             
                                 <td ><input type='image' src="/images/aa.png" id='grande' value='Texto Grande' class="letraG"  title="Ampliar fuente"/>
                                <input  type='image' src="/images/am.png"id='pequenyo' value='Texto Pequeño' class="letraG"  title="Reducir fuente" /></td>
                             
                            </tr>
                        <?php } ?>
                             <tr>
                                 <td height="8px"></td>
                            </tr>
                         </table>
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
                                 else { ?>
                                    <?php echo $sf_content ?><?php } ?>
                    </div><!--fin de middle_content-->
                    <div id="bottom_content" class="back-png">
                        <table  width="100%"   align="center" cellpadding="0" cellspacing="0" border="0">
                            <tr>
                                <td height="30px"> </td>
                            </tr>
                            <tr>
                                <td valign="bottom">
                                    <table  width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                                        <tr>
                                            <td align="center">
                                                <table width="900px" >
                                                    <tr>
                                                        <td align="left">
                                                             &nbsp; &copy;Galeno 2010  &nbsp; &nbsp;
                                                        </td>
                                                        <td align="left">
                                                        </td>
                                                        <td align="right">
                                                            <a href="<?php echo url_for('@homepage') ?>"><font   style="font-weight: normal">Inicio</font></a> |
                                                            <a href="<?php echo url_for('triptico') ?>"><font   style="font-weight: normal">Tripticos</font></a> |
                                                            <a href="<?php echo url_for('@construccion') ?>"><font   style="font-weight: normal">Noticias</font></a> |
                                                            <a href="<?php echo url_for('@construccion') ?>"><font   style="font-weight: normal">Enlaces</font></a> |
                                                            <a href="<?php echo url_for('@construccion') ?>"><font   style="font-weight: normal">Ayuda</font></a>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div><!--fin de content-->
            </div><!--fin de principale-->
        </div><!--fin de fond-->

    </body>
</html>