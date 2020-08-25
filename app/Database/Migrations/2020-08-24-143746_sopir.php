<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Sopir extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'kd_supir' => [
				'type' => 'varchar',
				'constraint' => 20
			],
			'no_perk' => [
				'type' => 'varchar',
				'constraint' => 20
			],
			'nama_supir' => [
				'type' => 'varchar',
				'constraint' => 30
			],
			'jln_supir' => [
				'type' => 'varchar',
				'constraint' => 50
			],
			'no_jln_supir' => [
				'type' => 'int',
				'constraint' => 5
			],
			'kota_supir' => [
				'type' => 'varchar',
				'constraint' => 20
			],
			'kecamatan_supir' => [
				'type' => 'varchar',
				'constraint' => 20
			],
			'kelurahan_supir' => [
				'type' => 'varchar',
				'constraint' => 20
			],
			'kodepos_supir' => [
				'type' => 'int',
				'constraint' => 10
			],
			'status_supir' => [
				'type' => 'enum',
				'constraint' => ['sedia', 'tidak tersedia']
			],
			'created_at' => [
				'type' => 'date',
			],
			'updated_at' => [
				'type' => 'date',
				'null' => true
			],
		]);

		$this->forge->addPrimaryKey('kd_supir');
		$this->forge->addKey('no_perk');
		$this->forge->createTable('supir');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
	}
}
