<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

use function PHPSTORM_META\type;

class Pelanggan extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'kd_pel' => [
				'type' => 'varchar',
				'constraint' => 20
			],
			'nama_pel' => [
				'type' => 'varchar',
				'constraint' => 30
			],
			'jln_pel' => [
				'type' => 'varchar',
				'constraint' => 30
			],
			'no_jln_pel' => [
				'type' => 'varchar',
				'constraint' => 30
			],
			'kota_pel' => [
				'type' => 'varchar',
				'constraint' => 30
			],
			'kelurahan_pel' => [
				'type' => 'varchar',
				'constraint' => 30
			],
			'kecamatan_pel' => [
				'type' => 'varchar',
				'constraint' => 30
			],
			'kodepos_pel' => [
				'type' => 'varchar',
				'constraint' => 30
			],
			'notelp_pel' => [
				'type' => 'int',
				'constraint' => 30
			],
			'cp_pel' => [
				'type' => 'varchar',
				'constraint' => 30
			],
			'hp_pel' => [
				'type' => 'int',
				'constraint' => 30,
				'null' => true
			],
			'status_pel' => [
				'type' => 'varchar',
				'constraint' => 30,
			],
			'created_at' => [
				'type' => 'date',
			],
			'updated_at' => [
				'type' => 'date',
				'null' => true
			],
		]);

		$this->forge->addPrimaryKey('kd_pel');
		$this->forge->createTable('pelanggan');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
	}
}
