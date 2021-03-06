<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Regular', 'doctrine');

/**
 * BaseRegular
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $usuario_id
 * @property string $ubicacion
 * @property boolean $notificacion
 * @property Usuario $Usuario
 * 
 * @method integer getId()           Returns the current record's "id" value
 * @method integer getUsuarioId()    Returns the current record's "usuario_id" value
 * @method string  getUbicacion()    Returns the current record's "ubicacion" value
 * @method boolean getNotificacion() Returns the current record's "notificacion" value
 * @method Usuario getUsuario()      Returns the current record's "Usuario" value
 * @method Regular setId()           Sets the current record's "id" value
 * @method Regular setUsuarioId()    Sets the current record's "usuario_id" value
 * @method Regular setUbicacion()    Sets the current record's "ubicacion" value
 * @method Regular setNotificacion() Sets the current record's "notificacion" value
 * @method Regular setUsuario()      Sets the current record's "Usuario" value
 * 
 * @package    galeno
 * @subpackage model
 * @author     Enimados
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseRegular extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('regular');
        $this->hasColumn('id', 'integer', 6, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => false,
             'length' => 6,
             ));
        $this->hasColumn('usuario_id', 'integer', 6, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'length' => 6,
             ));
        $this->hasColumn('ubicacion', 'string', 120, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 120,
             ));
        $this->hasColumn('notificacion', 'boolean', null, array(
             'type' => 'boolean',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Usuario', array(
             'local' => 'usuario_id',
             'foreign' => 'id'));
    }
}