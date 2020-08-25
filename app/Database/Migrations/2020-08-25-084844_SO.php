<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SO extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'no_so' => [
				'type' => 'varchar',
				'constraint' => 20
			],
			'kd_pel' => [
				'type' => 'varchar',
				'constraint' => 20
			],
			'status_so' => [
				'type' => 'enum',
				'constraint' => ['lunas', 'belum lunas'],
			],
			'total_so' => [
				'type' => 'int',
				'constraint' => 20,
				'unsigned' => true,
			],
			'created_at' => [
				'type' => 'date',
			],
			'updated_at' => [
				'type' => 'date',
				'null' => true
			]
		]);

		$this->forge->addPrimaryKey('no_so');
		$this->forge->addKey('kd_pel');
		$this->forge->createTable('so');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
	}
}
