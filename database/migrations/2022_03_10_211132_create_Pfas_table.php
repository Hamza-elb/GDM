<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePfasTable extends Migration {

	public function up()
	{
		Schema::create('Pfas', function(Blueprint $table) {
			$table->id();
			$table->timestamps();
			$table->string('Titre');
			$table->string('Specialite');
			$table->string('Realise_par');
			$table->string('Encadre_par');
			$table->longText('Mots_cle');
			$table->longText('Resume');
		});
	}

	public function down()
	{
		Schema::drop('Pfas');
	}
}
