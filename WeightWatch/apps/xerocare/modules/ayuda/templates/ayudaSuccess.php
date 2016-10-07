<?php use_javascript('tabla-img.js');
use_stylesheet('tabla-img.css'); ?>
<table width="100%" align="center"><tr><td align="center">
    <tr><td align="center"><h3>BIENVENIDO <?php echo $usuarios->getUsuario(); ?></h3></td></tr>
    <tr><td align="center">
<table  id="tablaR2" >
 <thead>
    <tr>
        <th scope="col"  class="rounded-company" width="200px"></th>
        <td scope="col" class="rounded-q4"></td>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th>Tripticos</th>
      <td>• La correcta nutrición del paciente obeso<br>
          <a href="<?php echo url_for('home/consejo')?>">• Consejos de una nutricionista</a><br>
          <a href="<?php echo url_for('home/correcto')?>">• La correcta nutrición del paciente obeso</a><br>
    </tr>
    <tr>
      <th>Registrar Usuario</th>
      <td><a href="<?php echo url_for('usuarionuevo')?>">• Registrar usuario nuevo</a></td>
    </tr>
   </tbody>
    <tfoot>
        <tr>
          <th class="rounded-foot-left"></th>
          <td class="rounded-foot-right"> </td>
        </tr>
    </tfoot>
</table>
        </td></tr></table>