<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kendaraan extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'no_perk' => [
				'type' => 'varchar',
				'constraint' => 20
			],
			'no_plat' => [
				'type' => 'varchar',
				'constraint' => 20
			],
			'tonase' => [
				'type' => 'int',
				'constraint' => 20
			],
			'volume' => [
				'type' => 'int',
				'constraint' => 20
			],
			'posisi' => [
				'type' => 'varchar',
				'constraint' => 20,
				'null' => true
			],
			'driver' => [
				'type' => 'varchar',
				'constraint' => 20
			],
			'status_kendaraan' => [
				'type' => 'varchar',
				'constraint' => 20
			],
			'created_at' => [
				'type' => 'date',
			],
			'updated_at' => [
				'type' => 'date',
				'null' => true
			],
		]);

		$this->forge->addPrimaryKey('no_park');
		$this->forge->createTable('kendaraan');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
	}
}
