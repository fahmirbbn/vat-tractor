<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RencanaKerja;
use App\Models\MasterUnit;
use App\Models\MasterImplement;
use App\Models\MasterActivity;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;

class RencanaKerjaController extends Controller
{

   public function index()
   {
      return view('admin.rencana_kerja.index');
   }

   public function create()
   {
    $units = MasterUnit::pluck('unit_name', 'id');
    $implements = MasterImplement::pluck('implement_name', 'id');
    $activities = MasterActivity::pluck('activity_name', 'id');

    return view('admin.rencana_kerja.create')->with([
        'units' => $units,
        'implements' => $implements,
        'activities' => $activities,
    ]);
   }


   public function edit($id)
   {
      $data = RencanaKerja::findOrFail($id);
      return view('admin.rencana_kerja.edit')->with([
         'data' => $data
      ]);
   }

   public function update(Request $request, $id)
   {
      $request->validate([
         'location_code' => 'required',
         'mst_unit_id' => 'required', 
         'implement_id' => 'required', 
         'mst_activity_id' => 'required',
         'activity_date' => 'required',
         'operator_name' => 'required',
      ]);

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
         return redirect()->route('admin.rencana_kerja.index')->withFlashSuccess(__('Data Updated Successfully'));
      } else {
         return redirect()->route('admin.rencana_kerja.index')->withFlashDanger(__('Data Failed To Update'));
      }
   }


   public function destroy($id)
   {
      $item = RencanaKerja::findOrFail($id);
      $item->delete();
      return redirect()->route('admin.rencana_kerja.index')->withFlashSuccess(__('Data Deleted Successfully'));
   }

   public function store(Request $request)
   {
      $request->validate([
         'location_code' => 'required',
         'mst_unit_id' => 'required', 
         'implement_id' => 'required', 
         'mst_activity_id' => 'required',
         'activity_date' => 'required',
         'operator_name' => 'required',
      ]);

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
         return redirect()->route('admin.rencana_kerja.index')->withFlashSuccess(__('Data Created Successfully'));
      } else {
         return redirect()->route('admin.rencana_kerja.index')->withFlashDanger(__('Data Failed To Create'));
      }
   }

   public function datatable(Request $request)
   {
      $data = RencanaKerja::query();
      if(!$request->order[0]['column']){
         $data = $data->orderBy('id', 'desc');
      }
      return DataTables::of($data)
         ->make(true);
   }
}
