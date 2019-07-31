<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormBooleansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_booleans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('gen1_oil')->default(false);
            $table->boolean('gen2_oil')->default(false);
            $table->boolean('gen1_oil_filter')->default(false);
            $table->boolean('gen2_oil_filter')->default(false);
            $table->boolean('gen1_fuel_filter')->default(false);
            $table->boolean('gen2_fuel_filter')->default(false);
            $table->boolean('gen1_lift_pump_filter')->default(false);
            $table->boolean('gen2_lift_pump_filter')->default(false);
            $table->boolean('gen1_air_filter')->default(false);
            $table->boolean('gen2_air_filter')->default(false);
            $table->boolean('gen1_clean')->default(false);
            $table->boolean('gen2_clean')->default(false);
            $table->boolean('gen1_radiator_clean')->default(false);
            $table->boolean('gen2_radiator_clean')->default(false);
            $table->boolean('gen1_sensor_status')->default(false);
            $table->boolean('gen2_sensor_status')->default(false);
            $table->boolean('gen1_charging_issue')->default(false);
            $table->boolean('gen2_charging_issue')->default(false);
            $table->boolean('engine_smoke_ok')->default(false);
            $table->boolean('engine_smoke_white')->default(false);
            $table->boolean('engine_smoke_black')->default(false);
            $table->boolean('oil_filter')->default(false);
            $table->boolean('oil_leakage_ok')->default(false);
            $table->boolean('oil_case')->default(false);
            $table->boolean('oil_pump')->default(false);
            $table->boolean('oil_drain')->default(false);
            $table->boolean('oil_valve_cover')->default(false);
            $table->boolean('oil_seal')->default(false);
            $table->boolean('water_leakage_ok')->default(false);
            $table->boolean('water_radiator_join')->default(false);
            $table->boolean('water_pump')->default(false);
            $table->boolean('fuel_leakage_ok')->default(false);
            $table->boolean('fuel_nozzle')->default(false);
            $table->boolean('fuel_pipe_valve')->default(false);
            $table->boolean('fuel_filter')->default(false);
            $table->boolean('fuel_tube')->default(false);
            $table->boolean('fuel_tank_piping')->default(false);
            $table->boolean('fuel_tank_pipe_valves')->default(false);
            $table->boolean('fuel_tank_drain')->default(false);
            $table->boolean('ats_board_clean')->default(false);
            $table->boolean('mdb_board_clean')->default(false);
            $table->boolean('rbs1_battery_set')->default(false);
            $table->boolean('rbs2_battery_sets')->default(false);
            $table->boolean('commercial_power')->default(false);
            $table->boolean('external_power')->default(false);
            $table->boolean('exceeding_power')->default(false);
            $table->boolean('ac_clean')->default(false);
            $table->boolean('site_clean')->default(false);
            $table->boolean('alarm_door_sensor_ok')->default(false);
            $table->boolean('alarm_door_sensor_not_ok')->default(false);
            $table->boolean('external_alarm_status_ok')->default(false);
            $table->boolean('external_alarm_status_not_ok')->default(false);
            $table->bigInteger('form_details_id');
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
        Schema::dropIfExists('form_booleans');
    }
}