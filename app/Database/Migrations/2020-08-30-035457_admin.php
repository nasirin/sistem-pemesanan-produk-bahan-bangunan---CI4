<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Admin extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_user' => ['type' => 'int', 'auto_increment' => true],
			'username' => ['type' => 'varchar', 'constraint' => 20],
			'password' => ['type' => 'varchar', 'constraint' => 50],
			'telepon' => ['type' => 'int', 'constraint' => 15],
			'level' => ['type' => 'enum', 'constraint' => ['admin', 'manager', 'pelanggan']],
		]);
		$this->forge->addPrimaryKey('id_user');
		$this->forge->createTable('user');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
	}
}
