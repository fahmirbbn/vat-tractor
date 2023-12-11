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
        Schema::create('master_activities', function (Blueprint $table) {
            $table->id();
            $table->string('activity_code', 20);
            $table->string('activity_name', 50);
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
        Schema::dropIfExists('master_activities');
    }
};
