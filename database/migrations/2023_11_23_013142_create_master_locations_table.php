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
        Schema::create('master_locations', function (Blueprint $table) {
            $table->id();
            $table->string('location_code', 50);
            $table->string('location_name', 50);
            $table->decimal('luas_bruto', 10, 2);
            $table->decimal('luas_netto', 10, 2);
            $table->string('geofence', 500);
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
        Schema::dropIfExists('master_locations');
    }
};
