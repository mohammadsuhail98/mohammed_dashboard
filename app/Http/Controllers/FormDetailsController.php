<?php

namespace App\Http\Controllers;

use App\FormDetails;
use Illuminate\Http\Request;
use App\FormBoolean;

class FormDetailsController extends Controller
{
    public function create(Request $request)
    {

        // $formBooleans = FormBoolean::create([
        //     "gen1_oil" => $request->gen1_oil,
        //     "gen2_oil" => $request->gen2_oil,
        //     "gen1_oil_filter" => $request->gen1_oil_filter,
        //     "gen2_oil_filter" => $request->gen2_oil_filter,
        //     "gen1_fuel_filter" => $request->gen1_fuel_filter,
        //     "gen2_fuel_filter" => $request->gen2_fuel_filter,
        //     "gen1_lift_pump_filter" => $request->gen1_lift_pump_filter,
        //     "gen2_lift_pump_filter" => $request->gen2_lift_pump_filter,
        //     "gen1_air_filter" => $request->gen1_air_filter,
        //     "gen2_air_filter" => $request->gen2_air_filter,
        //     "gen1_clean" => $request->gen1_clean,
        //     "gen2_clean" => $request->gen2_clean,
        //     "gen1_radiator_clean" => $request->gen1_radiator_clean,
        //     "gen2_radiator_clean" => $request->gen2_radiator_clean,
        //     "gen1_sensor_clean" => $request->gen1_sensor_clean,
        //     "gen2_sensor_clean" => $request->gen2_sensor_clean,
        //     "gen1_chargin_issue" => $request->gen1_chargin_issue,
        //     "gen2_chargin_issue" => $request->gen2_chargin_issue,
        //     "engine_smoke_white" => $request->engine_smoke_white,
        //     "engine_smoke_black" => $request->engine_smoke_black,
        //     "engine_smoke_ok" => $request->engine_smoke_ok,
        //     "oil_filter" => $request->oil_filter,
        //     "oil_leakage_ok" => $request->oil_leakage_ok,
        //     "oil_case" => $request->oil_case,
        //     "oil_pump" => $request->oil_pump,
        //     "oil_drain" => $request->oil_drain,
        //     "oil_valve_cover" => $request->oil_valve_cover,
        //     "oil_seal" => $request->oil_seal,
        //     "water_leakage_ok" => $request->water_leakage_ok,
        //     "water_radiator_join" => $request->water_radiator_join,
        //     "water_pump" => $request->water_pump,
        //     "fuel_leakage_ok" => $request->fuel_leakage_ok,
        //     "fuel_nozzle" => $request->fuel_nozzle,
        //     "fuel_pipe_valve" => $request->fuel_pipe_valve,
        //     "fuel_filter" => $request->fuel_filter,
        //     "fuel_tube" => $request->fuel_tube,
        //     "fuel_tank_pipe_valves" => $request->fuel_tank_pipe_valves,
        //     "fuel_tank_piping" => $request->fuel_tank_piping,
        //     "fuel_tank_drain" => $request->fuel_tank_drain,
        //     "ats_board_clean" => $request->ats_board_clean,
        //     "mdb_board_clean" => $request->mdb_board_clean,
        //     "rbs1_battery_clean" => $request->rbs1_battery_clean,
        //     "rbs2_battery_clean" => $request->rbs2_battery_clean,
        //     "commercial_power" => $request->commercial_power,
        //     "ac_clean" => $request->ac_clean,
        //     "site_clean" => $request->site_clean,
        //     "alarm_door_sensor_ok" => $request->alarm_door_sensor_ok,
        //     "alarm_door_sensor_not_ok" => $request->alarm_door_sensor_not_ok,
        //     "external_alarm_status_ok" => $request->external_alarm_status_ok,
        //     "external_alarm_status_not_ok" => $request->external_alarm_status_not_ok,
        // ]);

        // $formDetails = FormDetails::create([
        //     "data_and_time" => $request->data_and_time,
        //     "site_ref" => $request->site_ref,
        //     "site_type" => $request->site_type,
        //     "cluster_enginner" => $request->cluster_enginner,
        //     "check_man" => $request->check_man,
        //     "date" => $request->date,
        //     "location_latitude" => $request->location_latitude,
        //     "location_lognitude" => $request->location_longitude,
        //     "site_with_single_generator" => $request->site_with_single_generator,
        //     "s_n_generator1" => $request->s_n_generator1,
        //     "s_n_generator2" => $request->s_n_generator2,
        //     "gen1_type" => $request->gen1_type,
        //     "gen2_type" => $request->gen2_type,
        //     "gen1_size" => $request->gen1_size,
        //     "gen2_size" => $request->gen2_size,
        //     "gen1_status" => $request->gen1_status,
        //     "gen2_status" => $request->gen2_status,
        //     "gen1_rhours" => $request->gen1_rhours,
        //     "gen2_rhours" => $request->gen2_rhours,
        //     "gen1_oil_hours" => $request->gen1_oil_hours,
        //     "gen2_oil_hours" => $request->gen2_oil_hours,
        //     "fuel_tank_cm" => $request->fuel_tank_cm,
        //     "ats_contactor_status" => $request->ats_contactor_status,
        //     "relay_timer_status" => $request->relay_timer_status,
        //     "mdb_board_status" => $request->mdb_board_status,
        //     "surge_arrestor_status" => $request->surge_arrestor_status,
        //     "phase_failure_status" => $request->phase_failure_status,
        //     "rbs_cb_status" => $request->rbs_cb_status,
        //     "rbs_heat_exchanger" => $request->rbs_heat_exchanger,
        //     "ats_board_status" => $request->ats_board_status,
        //     "plc_board_status" => $request->plc_board_status,
        //     "rbs_door_sensor" => $request->rbs_door_,
        //     "clu_status" => $request->clu_status,
        //     "gst_status" => $request->gst_status,
        //     "fire_extiguisher_status" => $request->fire_extiguisher_status,
        //     "flexible_tube_status" => $request->flexible_tube_status,
        //     "ligths_status" => $request->ligths_status,
        //     "emergency_light_status" => $request->emergency_light_status,
        //     "no_of_psus_pdus" => $request->no_of_psus_pdus,
        //     "commercial_power_amperes" => $request->commercial_power_amperes,
        //     "commercial_power_cpeadings" => $request->commercial_power_cpeadings,
        //     "exceeding_power_amperes" => $request->exceeding_power_amperes,
        //     "ac_status" => $request->ac_status,
        //     "ac_type" => $request->ac_type,
        //     "ac_size" => $request->ac_size,
        //     "ac_control_status" => $request->ac_control_status,
        //     "external_power_amperes" => $request->external_power_amperes,
        //     "comments" => $request->comments,
        //     "general_notes" => $request->general_notes,
        //     "user_id" => auth()->user()->id,
        //     "form_booleans_id" => $formBooleans->id
        // ]);
        $form = FormDetails::create([
            'user_id' => auth()->user()->id,
        ]);
        $formBooleans = FormBoolean::create([
            'form_details_id' => $form->id
        ]);



        return response()->json([
            'message' => 'Done !',
            'success' => true,
            'data' => []
        ]);
    }
    public function getForms()
    {
        $user = auth()->user();
        if (!$user->is_admin)
            return response()->json([
                'message' => "You an't Admin NIGGA ! ",
                'success' => false,
                'data' => [],
            ], 403);
        $forms = FormDetails::all();
        $arr = [];
        foreach ($forms as $key => $form) {
            $obj = [
                'formDetails' => $form,
                'formBooleans' => $form->formBooleans
            ];
            array_push(
                $arr,
                $obj
            );
        }
        return response()->json([
            'message' => "",
            'success' => true,
            'data' => $arr,
        ]);
    }
    public function getSingleForm()
    {
        $user = auth()->user();
        // if ($user->isAdmin)
        //     return response()->json([
        //         'message' => "You don't have cuz u r ADMIN NIGGA !@",
        //         'success' => false,
        //         'data' => [],
        //     ]);

        $form = FormDetails::where('user_id', auth()->user()->id)->get();

        return response()->json([
            'message' => "",
            'success' => true,
            'data' => [
                "formDetails" => $form,
                "formBooleans" => $form[0]->formBooleans
            ]
        ]);
    }
}