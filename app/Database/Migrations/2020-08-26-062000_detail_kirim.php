<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DetailKirim extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'no_so' => ['type'=>'varchar','constraint'=>20],
			'no_sj' => ['type'=>'varchar','constraint'=>20],
			'kd_pel' => ['type'=>'varchar','constraint'=>20],
			'no_bayar' => ['type'=>'int','constraint'=>20],
			'no_perk' => ['type'=>'varchar','constraint'=>20],
		]);

		$this->forge->createTable('detail_kirim');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
	}
}
