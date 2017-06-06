<?php

use Phinx\Migration\AbstractMigration;

class DbConections extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        $table = $this->table('dbconnections');
        $table->addColumn('alias', 'string', array('limit' => 255))
            ->addColumn('hostname', 'string', array('limit' => 20))
            ->addColumn('port', 'integer')
            ->addColumn('username', 'string', array('limit' => 16))
            ->addColumn('password', 'string', array('limit' => 16))
            ->addColumn('database', 'string', array('limit' => 64))
            ->addIndex(array('id'), array('unique' => true))
            ->create();
    }

    /**
     * Migrate Up.
     */
    public function up()
    {

    }

    /**
     * Migrate Down.
     */
    public function down()
    {

    }    
}
