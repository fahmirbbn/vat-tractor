<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RencanaKerja;
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
      return view('admin.rencana_kerja.create');
   }

   public function edit($id)
   {
      $data = RencanaKerja::findOrFail($id);
      return view('admin.rencana_kerja.edit')->with([
         'data' => $data
      ]);
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
         'title'         => 'required|max:200',
         'description'   => 'required',
         'status'        => 'in:draft,published',
      ]);
      $data = [
         'title' => $request->title,
         'description' => $request->description,
         'status' => ($request->status) ? $request->status : 'draft',
      ];
      // if ($request->image) {
      //    $data['image'] = $request->file('image')->store('media_rencana_kerja', 'public');
      // }
      // $data['slug'] = Str::slug($request->title);
      // if (isset($request->id)) {
      //    $item = RencanaKerja::findOrFail($request->id);
      //    $query = $item->update($data);
      // } else {
      //    $query = RencanaKerja::create($data);
      // }
      if ($query) {
         return redirect()->route('admin.rencana_kerja.index')->withFlashSuccess(__('Data Saved Successfully'));
      } else {
         return redirect()->route('admin.rencana_kerja.index')->withFlashDanger(__('Data Failed To Save'));
      }
   }

   public function datatable(Request $request)
   {
      $data = RencanaKerja::query();
      if(!$request->order[0]['column']){
         $data = $data->orderBy('id', 'asc');
      }
      return DataTables::of($data)
         ->make(true);
   }
}
