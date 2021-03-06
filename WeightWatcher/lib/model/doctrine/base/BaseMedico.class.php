<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Medico', 'doctrine');

/**
 * BaseMedico
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $usuario_id
 * @property string $ubicacion
 * @property boolean $notificacion
 * @property string $especialidad
 * @property string $consultorio
 * @property Usuario $Usuario
 * 
 * @method integer getId()           Returns the current record's "id" value
 * @method integer getUsuarioId()    Returns the current record's "usuario_id" value
 * @method string  getUbicacion()    Returns the current record's "ubicacion" value
 * @method boolean getNotificacion() Returns the current record's "notificacion" value
 * @method string  getEspecialidad() Returns the current record's "especialidad" value
 * @method string  getConsultorio()  Returns the current record's "consultorio" value
 * @method Usuario getUsuario()      Returns the current record's "Usuario" value
 * @method Medico  setId()           Sets the current record's "id" value
 * @method Medico  setUsuarioId()    Sets the current record's "usuario_id" value
 * @method Medico  setUbicacion()    Sets the current record's "ubicacion" value
 * @method Medico  setNotificacion() Sets the current record's "notificacion" value
 * @method Medico  setEspecialidad() Sets the current record's "especialidad" value
 * @method Medico  setConsultorio()  Sets the current record's "consultorio" value
 * @method Medico  setUsuario()      Sets the current record's "Usuario" value
 * 
 * @package    galeno
 * @subpackage model
 * @author     Enimados
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseMedico extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('medico');
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
        $this->hasColumn('especialidad', 'string', 45, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 45,
             ));
        $this->hasColumn('consultorio', 'string', 45, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 45,
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