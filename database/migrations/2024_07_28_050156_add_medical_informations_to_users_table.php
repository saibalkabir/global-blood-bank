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
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('is_donation_available')->default(true); // for donors
            $table->text('tel')->nullable();
            $table->text('emergency_contct')->nullable();
            $table->text('medical_basic_info')->nullable();
            $table->integer('blood_type_id')->references('id')->nullable(); // FK to blood_types
            $table->integer('location_id')->references('id')->nullable(); // FK to locations
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('is_donation_available'); // for donors
            $table->dropColumn('tel');
            $table->dropColumn('emergency_contct');
            $table->dropColumn('medical_basic_info');
            $table->dropColumn('blood_type_id'); // FK to blood_types
            $table->dropColumn('location_id');
        });
    }
};
