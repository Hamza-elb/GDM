<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePfesTable extends Migration {

	public function up()
	{
		Schema::create('Pfes', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('Titre', 100);
			$table->string('Specialite', 100);
			$table->string('Realise_par', 50);
			$table->string('Encadre_par', 50);
			$table->longText('Mots_cle');
			$table->longText('Resume');
		});
	}

	public function down()
	{
		Schema::drop('Pfes');
	}
}