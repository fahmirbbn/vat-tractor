<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\RencanaKerja;
use App\Models\MasterUnit;
use App\Models\MasterImplement;
use App\Models\MasterActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RencanaKerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $rencanaKerjas = RencanaKerja::all();
            return response()->json([
                'status' => true,
                'message' => 'Data retrieved successfully',
                'count' => count($rencanaKerjas),
                'data' => $rencanaKerjas
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'line' => $th->getLine(),
                'message' => $th->getMessage(),
                'data' => []
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'location_code' => 'required',
                'mst_unit_id' => 'required|exists:master_units,id',
                'implement_id' => 'required|exists:master_implements,id',
                'mst_activity_id' => 'required|exists:master_activities,id',
                'activity_date' => 'required|date',
                'operator_name' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validation error',
                    'data' => $validator->errors()
                ], 400);
            }

            $unit = MasterUnit::findOrFail($request->mst_unit_id);
            $unitName = $unit->unit_name;

            $activities = MasterActivity::findOrFail($request->mst_activity_id);
            $activityName = $activities->activity_name;

            $implements = MasterImplement::findOrFail($request->implement_id);
            $implementName = $implements->implement_name;

            $data = [
                'location_code' => $request->location_code,
                'unit_name' => $unitName,
                'implement_name' => $implementName,
                'activity_name' => $activityName,
                'activity_date' => $request->activity_date,
                'operator_name' => $request->operator_name,
            ];

            $query = RencanaKerja::create($data);

            if ($query) {
                return response()->json([
                    'status' => true,
                    'message' => 'Data created successfully',
                    'count' => 1,
                    'data' => $query
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Data failed to create',
                    'data' => []
                ], 500);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'line' => $th->getLine(),
                'message' => $th->getMessage(),
                'data' => []
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $rencanaKerja = RencanaKerja::findOrFail($id);
            return response()->json([
                'status' => true,
                'message' => 'Data retrieved successfully',
                'count' => 1,
                'data' => $rencanaKerja
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'line' => $th->getLine(),
                'message' => $th->getMessage(),
                'data' => []
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function update(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'location_code' => 'required',
                'mst_unit_id' => 'required|exists:master_units,id',
                'implement_id' => 'required|exists:master_implements,id',
                'mst_activity_id' => 'required|exists:master_activities,id',
                'activity_date' => 'required|date',
                'operator_name' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validation error',
                    'data' => $validator->errors()
                ], 400);
            }

            $unit = MasterUnit::findOrFail($request->mst_unit_id);
            $unitName = $unit->unit_name;

            $activities = MasterActivity::findOrFail($request->mst_activity_id);
            $activityName = $activities->activity_name;

            $implements = MasterImplement::findOrFail($request->implement_id);
            $implementName = $implements->implement_name;

            $data = [
                'location_code' => $request->location_code,
                'unit_name' => $unitName,
                'implement_name' => $implementName,
                'activity_name' => $activityName,
                'activity_date' => $request->activity_date,
                'operator_name' => $request->operator_name,
            ];

            $query = RencanaKerja::findOrFail($id)->update($data);

            if ($query) {
                return response()->json([
                    'status' => true,
                    'message' => 'Data updated successfully',
                    'count' => 1,
                    'data' => RencanaKerja::findOrFail($id)
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Data failed to update',
                    'data' => []
                ], 500);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'line' => $th->getLine(),
                'message' => $th->getMessage(),
                'data' => []
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $item = RencanaKerja::findOrFail($id);
            $item->delete();
            return response()->json([
                'status' => true,
                'message' => 'Data deleted successfully',
                'count' => 1,
                'data' => []
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'line' => $th->getLine(),
                'message' => $th->getMessage(),
                'data' => []
            ]);
        }
    }
}
