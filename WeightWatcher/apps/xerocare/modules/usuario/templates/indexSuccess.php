<h1>Usuarios List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Cedula</th>
      <th>Usuario</th>
      <th>Nombre</th>
      <th>Apellido</th>
      <th>Clave</th>
      <th>Mail</th>
      <th>Tipo</th>
      <th>Status</th>
      <th>Ubicacion</th>
      <th>Notificacion</th>
      <th>Especialidad</th>
      <th>Consultorio</th>
      <th>Last login</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($usuarios as $usuario): ?>
    <tr>
      <td><a href="<?php echo url_for('usuario/edit?id='.$usuario->getId()) ?>"><?php echo $usuario->getId() ?></a></td>
      <td><?php echo $usuario->getCedula() ?></td>
      <td><?php echo $usuario->getUsuario() ?></td>
      <td><?php echo $usuario->getNombre() ?></td>
      <td><?php echo $usuario->getApellido() ?></td>
      <td><?php echo $usuario->getClave() ?></td>
      <td><?php echo $usuario->getMail() ?></td>
      <td><?php echo $usuario->getTipoId() ?></td>
      <td><?php echo $usuario->getStatus() ?></td>
      <td><?php echo $usuario->getUbicacion() ?></td>
      <td><?php echo $usuario->getNotificacion() ?></td>
      <td><?php echo $usuario->getEspecialidad() ?></td>
      <td><?php echo $usuario->getConsultorio() ?></td>
      <td><?php echo $usuario->getLastLogin() ?></td>
      <td><?php echo $usuario->getCreatedAt() ?></td>
      <td><?php echo $usuario->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('usuario/new') ?>">New</a>
