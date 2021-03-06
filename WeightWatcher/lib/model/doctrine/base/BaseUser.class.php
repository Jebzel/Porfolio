<?php

/**
 * BaseUser
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $cedula
 * @property string $usuario
 * @property string $nombre
 * @property string $apellido
 * @property string $clave
 * @property string $mail
 * @property integer $tipo_id
 * @property boolean $status
 * @property timestamp $last_login
 * @property timestamp $created_at
 * @property Tipo $Tipo
 * 
 * @method integer   getId()         Returns the current record's "id" value
 * @method string    getCedula()     Returns the current record's "cedula" value
 * @method string    getUsuario()    Returns the current record's "usuario" value
 * @method string    getNombre()     Returns the current record's "nombre" value
 * @method string    getApellido()   Returns the current record's "apellido" value
 * @method string    getClave()      Returns the current record's "clave" value
 * @method string    getMail()       Returns the current record's "mail" value
 * @method integer   getTipoId()     Returns the current record's "tipo_id" value
 * @method boolean   getStatus()     Returns the current record's "status" value
 * @method timestamp getLastLogin()  Returns the current record's "last_login" value
 * @method timestamp getCreatedAt()  Returns the current record's "created_at" value
 * @method Tipo      getTipo()       Returns the current record's "Tipo" value
 * @method User      setId()         Sets the current record's "id" value
 * @method User      setCedula()     Sets the current record's "cedula" value
 * @method User      setUsuario()    Sets the current record's "usuario" value
 * @method User      setNombre()     Sets the current record's "nombre" value
 * @method User      setApellido()   Sets the current record's "apellido" value
 * @method User      setClave()      Sets the current record's "clave" value
 * @method User      setMail()       Sets the current record's "mail" value
 * @method User      setTipoId()     Sets the current record's "tipo_id" value
 * @method User      setStatus()     Sets the current record's "status" value
 * @method User      setLastLogin()  Sets the current record's "last_login" value
 * @method User      setCreatedAt()  Sets the current record's "created_at" value
 * @method User      setTipo()       Sets the current record's "Tipo" value
 * 
 * @package    galeno
 * @subpackage model
 * @author     Enimados
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseUser extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('user');
        $this->hasColumn('id', 'integer', 6, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             'length' => 6,
             ));
        $this->hasColumn('cedula', 'string', 9, array(
             'type' => 'string',
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 9,
             ));
        $this->hasColumn('usuario', 'string', 30, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 30,
             ));
        $this->hasColumn('nombre', 'string', 30, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 30,
             ));
        $this->hasColumn('apellido', 'string', 45, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 45,
             ));
        $this->hasColumn('clave', 'string', 20, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 20,
             ));
        $this->hasColumn('mail', 'string', 45, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 45,
             ));
        $this->hasColumn('tipo_id', 'integer', 6, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => 6,
             ));
        $this->hasColumn('status', 'boolean', null, array(
             'type' => 'boolean',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'default' => true,
             ));
        $this->hasColumn('last_login', 'timestamp', null, array(
             'type' => 'timestamp',
             ));
        $this->hasColumn('created_at', 'timestamp', null, array(
             'type' => 'timestamp',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Tipo', array(
             'local' => 'tipo_id',
             'foreign' => 'id'));
    }
}