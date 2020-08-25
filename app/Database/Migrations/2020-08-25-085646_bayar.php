<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Bayar extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'no_bayar' => [
				'type' => 'int',
				'auto_increment' => true
			],
			'no_so' => [
				'type' => 'varchar',
				'constraint' => 20
			],
			'jumlah' => [
				'type' => 'int',
				'constraint' => 20,
				'unsigned' => true,
			],
			'keterangan' => [
				'type' => 'varchar',
				'constraint' => 255,
				'null' => true
			],
			'created_at' => [
				'type' => 'date',
			],
			'updated_at' => [
				'type' => 'date',
				'null' => true
			],

		]);

		$this->forge->addPrimaryKey('no_bayar');
		$this->forge->addKey('no_so');
		$this->forge->createTable('bayar');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
	}
}
