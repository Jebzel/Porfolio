
<?php use_javascript('tabla-img.js');
use_stylesheet('tabla-img.css'); ?>
<table  width="100%" align="center"><tr><td align="center">
    <tr><td align="center">
              <table align="center" width="100%" cellpadding="0" cellspacing="0">
                    <tr>
                        <td  align="center">
                           <?php echo image_tag('bienvenido.png', array('alt' => 'Bienvenido'));?>
                             <hr align="center"> 
                        </td>
                    </tr>
                </table>
        </td></tr>
    <tr><td align="center">
<table  width="100%" align="center" >

    <tr>
        <th  align="right" width="50%" height="20px">Usuario: &nbsp;</th>
      <td  align="left"> <?php echo $usuarios->getUsuario(); ?></td>
    </tr> 

    <tr>
        <th align="right" height="20px">Nombre: &nbsp;</th>
      <td align="left"> <?php echo $usuarios->getNombre(); ?></td>
    </tr>
    <?php if ($usuarios->getApellido()!='' && $usuarios->getApellido()!=' ') { ?>
    <tr>
      <th align="right" height="20px">Apellido: &nbsp;</th>
      <td align="left"> <?php echo $usuarios->getApellido(); ?></td>
    </tr>
    <?php }
     if ($usuarios->getCedula()!="") { ?>
     <tr>
      <th align="right" height="20px">Cédula: &nbsp;<th>
      <td align="left"> <?php echo $usuarios->getCedula(); ?></td>
    </tr>
     <?php } ?>
    <tr>
      <th align="right" height="20px">Correo Electrónico: &nbsp;</th>
      <td align="left"> <?php echo $usuarios->getMail(); ?></td>
    </tr>
    <?php if ($usuarios->getUbicacion()!="") { ?>
    <tr>
      <th align="right" height="20px">Ubicación: &nbsp;</th>
      <td align="left"> <?php echo $usuarios->getUbicacion(); ?></td>
    </tr>
    <?php } ?>

        <tr>
          <th  align="right" height="20px">Notificación por correo: &nbsp;</th>
          <td   align="left"> <?php if ($usuarios->getNotificacion()==true) echo "Sí"; else echo "No"; ?>
          </td>
        </tr>
      <tr>
          <td  align="center" height="40px" colspan="2">Utilice el menú superior para desplazarse a través de la página, o vaya directamente al <a href="<?php echo url_for("@homepage")?>">inicio</a></td>
        </tr>

</table>
</td></tr></table>
