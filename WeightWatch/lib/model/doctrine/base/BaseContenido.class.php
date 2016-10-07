<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Contenido', 'doctrine');

/**
 * BaseContenido
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $titulo
 * @property string $descripcion
 * @property string $direccion
 * @property boolean $status
 * 
 * @method integer   getId()          Returns the current record's "id" value
 * @method string    getTitulo()      Returns the current record's "titulo" value
 * @method string    getDescripcion() Returns the current record's "descripcion" value
 * @method string    getDireccion()   Returns the current record's "direccion" value
 * @method boolean   getStatus()      Returns the current record's "status" value
 * @method Contenido setId()          Sets the current record's "id" value
 * @method Contenido setTitulo()      Sets the current record's "titulo" value
 * @method Contenido setDescripcion() Sets the current record's "descripcion" value
 * @method Contenido setDireccion()   Sets the current record's "direccion" value
 * @method Contenido setStatus()      Sets the current record's "status" value
 * 
 * @package    galeno
 * @subpackage model
 * @author     Enimados
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseContenido extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('contenido');
        $this->hasColumn('id', 'integer', 6, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 6,
             ));
        $this->hasColumn('titulo', 'string', 50, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 50,
             ));
        $this->hasColumn('descripcion', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('direccion', 'string', 60, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 60,
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
    }

    public function setUp()
    {
        parent::setUp();
        
    }
}