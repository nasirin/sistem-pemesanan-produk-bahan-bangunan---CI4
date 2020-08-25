<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Sj extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'no_sj' => [
				'type' => 'varchar',
				'constraint' => 20
			],
			'no_so' => [
				'type' => 'varchar',
				'constraint' => 20
			],
			'no_perk' => [
				'type' => 'varchar',
				'constraint' => 20
			],
			'berat' => [
				'type' => 'int',
				'constraint' => 20,
				'unsigned' => true
			],
			'tujuan' => [
				'type' => 'varchar',
				'constraint' => 20,
			],
			'muatan' => [
				'type' => 'varchar',
				'constraint' => 50,
			],
			'status_sj' => [
				'type' => 'varchar',
				'constraint' => 50,
				'null' => true
			],
			'created_at' => [
				'type' => 'date',
			],
			'created_at' => [
				'type' => 'date',
				'null' => true
			],

		]);

		$this->forge->addPrimaryKey('no_sj');
		$this->forge->createTable('sj');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('sj');
	}
}
