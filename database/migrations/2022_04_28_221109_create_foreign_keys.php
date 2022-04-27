<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rapports', function(Blueprint $table) {
            $table->foreign( 'pfa_id')->references('id')->on('pfas')->onDelete('cascade');
        });

        Schema::table('rapport_pfes', function(Blueprint $table) {
            $table->foreign( 'pfe_id')->references('id')->on('Pfes')->onDelete('cascade');
        });

        Schema::table('rapport_stages', function(Blueprint $table) {
            $table->foreign( 'stage_id')->references('id')->on('Stages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }

}
