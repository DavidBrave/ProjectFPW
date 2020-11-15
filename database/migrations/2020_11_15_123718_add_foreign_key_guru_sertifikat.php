<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyGuruSertifikat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Sertifikat', function (Blueprint $table) {
            $table->foreign("Guru_ID")->references("Guru_ID")->on("Guru");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Sertifikat', function (Blueprint $table) {
            $table->dropForeign("Guru_ID");
        });
    }
}
