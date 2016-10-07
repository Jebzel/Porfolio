<?php slot('title', 'Registro de Usuarios');
// use_javascript('tabla-img.js')
 //use_stylesheet('tabla-img.css')
use_javascript('sf_widget_gmap_address.js');?>
<!--host-->
<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;sensor=true&amp;key=ABQIAAAA_SlG7500OFgsZD5kMi6OwxRDGbo5XSlf-i0Sdkq-Qqja-vMn_xRdx1SPOWN3w0eTKB3rx3H1UQrZKw" type="text/javascript"></script>

<!--local
<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;sensor=true&amp;key=ABQIAAAA7GF-Er_mUqt-IuBAIODH_BQEcH_q2Q1KKXUI_OUd1OKjSymrqBSklaGOYcPWWG3q3tYCiDPkm2QBFQ" type="text/javascript"></script>
-->
<script type="text/javascript">
    $(document).ready(function(){
            <?php  if (isset($address)) { ?>
            $("#usuario_ubicacion_address").val("<?php echo $address; ?>");
        <?php }// else $address="";?>
      });

</script>
<?php if ($sf_user->isAuthenticated()){ ?>
     <table  width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
         <tr>
            <td align="center">
                 <div class="flash_error">
                     Debe cerrar sesión para registrar un nuevo usuario
                  </div>
            </td>
         </tr>
     </table>
<?php } else { ?>
<form action="create" method="post" name="usuarioForm">
    <table align="center" width="100%">
    <tfoot>
      <tr>
        <td colspan="2" align="center">
          <input class="small blue awesome" type="submit" value="Aceptar" />
        </td>
      </tr>
    </tfoot>
    <tbody>
         <?php if ($form->hasGlobalErrors()){?>
            <?php foreach ($form->getGlobalErrors() as $nombre => $error){
                if ($error!==''){?>
                    <tr>
                        <td colspan="2">
                            <div class="flash_error">
                                <li><?php echo $nombre.': '.$error ?></li>
                            </div>
                        </td>
                    </tr>
                <?php }}} ?>
         <tr>
            <td colspan="2" align="center">
                <table align="center" width="100%" cellpadding="0" cellspacing="0">
                    <tr>
                        <td  align="center">
                           <?php echo image_tag('usuario.png', array('alt' => 'REGISTRO DE USUARIOS'));?>
                             <hr align="center"><?php echo $form['_csrf_token']->render()?>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <?php /*
        <tr>
            <th  align="right" valign="middle"><?php echo $form['cedula']->renderLabel() ?></th>
            <td ><?php echo $form["cedula"]->renderError();?><?php echo $form["cedula"]->render();?></td>
        </tr>
        */?>
        <tr>
            <th  align="right" valign="middle"><?php echo $form['nombre']->renderLabel() ?></th>
            <td ><?php echo $form["nombre"]->renderError();?><?php echo $form["nombre"]->render();?></td>
        </tr>
        <tr>
             <th  align="right" valign="middle"><?php echo $form['apellido']->renderLabel() ?></th>
            <td ><?php echo $form["apellido"]->renderError();?><?php echo $form["apellido"]->render();?></td>
        </tr>
        <tr>
             <th  align="right" valign="middle"><?php echo $form['usuario']->renderLabel() ?></th>
            <td ><?php if (isset($existeU) && $existeU==1) {?> <ul class="error_list"> <li>El nombre de usuario ya se encuentra registrado, intente con uno nuevo.</li></ul><?php } ?><?php echo $form["usuario"]->renderError();?><?php echo $form["usuario"]->render();?></td>
        </tr>
        <tr>
            <th  align="right" valign="middle"><?php echo $form['mail']->renderLabel() ?></th>
            <td ><?php if (isset($existe) && $existe==1) {?> <ul class="error_list"> <li>El correo ya se encuentra registrado.</li></ul><?php } ?>
                    <?php echo $form["mail"]->renderError();?><?php echo $form["mail"]->render();?></td>
        </tr>
        <tr>
             <th  align="right" valign="middle"><?php echo $form['clave']->renderLabel() ?></th>
            <td ><?php echo $form["clave"]->renderError();?><?php echo $form["clave"]->render();?></td>
        </tr>
        <tr>
             <th  align="right" valign="middle"><label>Contraseña (nuevamente)</label></th>
            <td><?php if (isset($existeC) && $existeC==1) {?> <ul class="error_list"> <li>La contraseña suministrada no concuerda con la anterior.</li></ul><?php } ?><input type="password" name="clave2" /></td>
        </tr>
        <tr>
             <th align="right" valign="middle"><?php echo $form['ubicacion']->renderLabel() ?></th>
            <td ><?php echo $form["ubicacion"]->renderError();?><?php if (isset($address) && $address=="") {?> <ul class="error_list"> <li>La ubicación es requerida.</li></ul><?php } ?><?php echo $form["ubicacion"]->render();?>Indique la ciudad de su preferencia.</td>
        </tr>
        <tr>
             <th  align="right" valign="middle"><?php echo $form['notificacion']->renderLabel() ?></th>
             <td  valign="middle" height="10px"><?php echo $form["notificacion"]->renderError();?><?php echo $form["notificacion"]->render();?>  Marque esta casilla si desea recibir notificación por correo sobre nuestro producto.</td>
        </tr>

    </tbody>
  </table>
    <br>
</form>
<?php }  ?>