<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('date_and_time')->default('string here');
            $table->string('site_ref')->default('string here');
            $table->string('site_type')->default('string here');
            $table->string('cluster_enginner')->default('string here');
            $table->string('check_man')->default('string here');
            $table->string('date')->default('string here');
            $table->string('location_latitude')->default('string here');
            $table->string('location_longitude')->default('string here');
            $table->string('site_with_single_generator')->default('string here');
            $table->string('s_n_generator1')->default('string here');
            $table->string('s_n_generator2')->default('string here');
            $table->string('gen1_type')->default('string here');
            $table->string('gen2_type')->default('string here');
            $table->string('gen1_size')->default('string here');
            $table->string('gen2_size')->default('string here');
            $table->string('gen1_status')->default('string here');
            $table->string('gen2_status')->default('string here');
            $table->string('gen1_rhours')->default('string here');
            $table->string('gen2_rhours')->default('string here');
            $table->string('gen1_oil_hours')->default('string here');
            $table->string('gen2_oil_hours')->default('string here');
            $table->string('fuel_tank_cm')->default('string here');
            $table->string('ats_contactor_status')->default('string here');
            $table->string('relay_timer_status')->default('string here');
            $table->string('mdb_board_status')->default('string here');
            $table->string('surge_arrestor_status')->default('string here');
            $table->string('phase_failure_status')->default('string here');
            $table->string('rbs_cb_status')->default('string here');
            $table->string('rbs_heat_exchanger')->default('string here');
            $table->string('ats_board_status')->default('string here');
            $table->string('plc_board_status')->default('string here');
            $table->string('rbs_door_sensor')->default('string here');
            $table->string('clu_status')->default('string here');
            $table->string('gst_status')->default('string here');
            $table->string('fire_extiguisher_status')->default('string here');
            $table->string('flexible_tube_status')->default('string here');
            $table->string('lights_status')->default('string here');
            $table->string('emergency_lights_status')->default('string here');
            $table->string('no_of_psus_pdus')->default('string here');
            $table->string('commercial_power_amperes')->default('string here');
            $table->string('commercial_power_cpreadings')->default('string here');
            $table->string('exceeding_power_amperes')->default('string here');
            $table->string('ac_status')->default('string here');
            $table->string('ac_type')->default('string here');
            $table->string('ac_size')->default('string here');
            $table->string('ac_control_status')->default('string here');
            $table->string('external_power_amperes')->default('string here');
            $table->string('comments')->default('string here');
            $table->string('general_notes')->default('string here');
            $table->boolean('is_active')->default(true);
            $table->bigInteger('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('form_details');
    }
}