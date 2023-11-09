<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rencana_kerja', function (Blueprint $table) {
            $table->increments('id');
            $table->string('location_code', 50);
            $table->unsignedBigInteger('mst_unit_id')->nullable();
            $table->string('unit_name', 100);
            $table->unsignedBigInteger('implement_id')->nullable();
            $table->string('implement_name', 100);
            $table->unsignedBigInteger('mst_activity_id')->nullable();
            $table->string('activity_name', 100);
            $table->date('activity_date');
            $table->string('operator_name', 100);
            $table->integer('created_by')->nullable();
            $table->dateTime('created_at')->useCurrent();
            $table->integer('updated_by')->nullable();
            $table->dateTime('updated_at')->nullable()->useCurrentOnUpdate();
            $table->softDeletes()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rencana_kerjas');
    }
};
