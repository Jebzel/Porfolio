<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('usuario/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('usuario/index') ?>">Back to list</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'usuario/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Save" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['cedula']->renderLabel() ?></th>
        <td>
          <?php echo $form['cedula']->renderError() ?>
          <?php echo $form['cedula'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['usuario']->renderLabel() ?></th>
        <td>
          <?php echo $form['usuario']->renderError() ?>
          <?php echo $form['usuario'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['nombre']->renderLabel() ?></th>
        <td>
          <?php echo $form['nombre']->renderError() ?>
          <?php echo $form['nombre'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['apellido']->renderLabel() ?></th>
        <td>
          <?php echo $form['apellido']->renderError() ?>
          <?php echo $form['apellido'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['clave']->renderLabel() ?></th>
        <td>
          <?php echo $form['clave']->renderError() ?>
          <?php echo $form['clave'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['mail']->renderLabel() ?></th>
        <td>
          <?php echo $form['mail']->renderError() ?>
          <?php echo $form['mail'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['tipo_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['tipo_id']->renderError() ?>
          <?php echo $form['tipo_id'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['status']->renderLabel() ?></th>
        <td>
          <?php echo $form['status']->renderError() ?>
          <?php echo $form['status'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['ubicacion']->renderLabel() ?></th>
        <td>
          <?php echo $form['ubicacion']->renderError() ?>
          <?php echo $form['ubicacion'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['notificacion']->renderLabel() ?></th>
        <td>
          <?php echo $form['notificacion']->renderError() ?>
          <?php echo $form['notificacion'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['especialidad']->renderLabel() ?></th>
        <td>
          <?php echo $form['especialidad']->renderError() ?>
          <?php echo $form['especialidad'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['consultorio']->renderLabel() ?></th>
        <td>
          <?php echo $form['consultorio']->renderError() ?>
          <?php echo $form['consultorio'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['last_login']->renderLabel() ?></th>
        <td>
          <?php echo $form['last_login']->renderError() ?>
          <?php echo $form['last_login'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['created_at']->renderLabel() ?></th>
        <td>
          <?php echo $form['created_at']->renderError() ?>
          <?php echo $form['created_at'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['updated_at']->renderLabel() ?></th>
        <td>
          <?php echo $form['updated_at']->renderError() ?>
          <?php echo $form['updated_at'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['clave2']->renderLabel() ?></th>
        <td>
          <?php echo $form['clave2']->renderError() ?>
          <?php echo $form['clave2'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
