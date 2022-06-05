<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStagesTable extends Migration {

	public function up()
	{
		Schema::create('Stages', function(Blueprint $table) {
			$table->id();
			$table->timestamps();
			$table->string('Titre', 100);
			$table->string('Specialite', 100);
			$table->string('Realise_par', 50);
			$table->string('Encadre_par', 50);
			$table->longText('Mots_cle');
			$table->longText('Resume');
            $table->string('Type')->default('Stage');
		});
	}

	public function down()
	{
		Schema::drop('Stages');
	}
}
