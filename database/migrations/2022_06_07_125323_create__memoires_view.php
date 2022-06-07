<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemoiresView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement($this->createView());
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \DB::statement($this->dropView());

    }

    private function createView(): string
    {
        return <<<SQL

            CREATE VIEW memoiresView AS
                SELECT * FROM  pfas
                UNION
                SELECT * FROM  stages
                UNION
                SELECT * FROM  pfes

            SQL;
    }


}
