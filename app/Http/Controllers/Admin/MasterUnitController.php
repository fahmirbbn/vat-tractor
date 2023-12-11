<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MasterUnit;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;

class MasterUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.unit.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.unit.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'unit_code' => 'required',
            'unit_name' => 'required',
            'pg_id' => 'required',
        ]);

        $data = [
            'unit_code' => $request->unit_code,
            'unit_name' => $request->unit_name,
            'pg_id' => $request->pg_id,
        ];

        $query = MasterUnit::create($data);

        if ($query) {
            return redirect()->route('admin.unit.index')->withFlashSuccess(__('Data Created Successfully'));
        } else {
            return redirect()->route('admin.unit.index')->withFlashDanger(__('Data Failed To Create'));
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = MasterUnit::findOrFail($id);
        return view('admin.unit.edit')->with([
            'data' => $data
        ]);
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
        $request->validate([
            'unit_code' => 'required',
            'unit_name' => 'required',
            'pg_id' => 'required',
        ]);

        $data = [
            'unit_code' => $request->unit_code,
            'unit_name' => $request->unit_name,
            'pg_id' => $request->pg_id,
        ];

        $query = MasterUnit::findOrFail($id)->update($data);

        if ($query) {
            return redirect()->route('admin.unit.index')->withFlashSuccess(__('Data Updated Successfully'));
        } else {
            return redirect()->route('admin.unit.index')->withFlashDanger(__('Data Failed To Update'));
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
        $data = MasterUnit::findOrFail($id);
        $data->delete();
        return redirect()->route('admin.unit.index')->with(['success' => 'Data Deleted Successfully']);
    }

    public function datatable(Request $request)
    {
        $data = MasterUnit::query();
        if(!$request->order[0]['column']){
            $data = $data->orderBy('id', 'asc');
        }
        return DataTables::of($data)
            ->make(true);
    }
}
