<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MasterActivity;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;

class MasterActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.activity.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.activity.create');
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
            'activity_code' => 'required',
            'activity_name' => 'required',
        ]);

        $data = [
            'activity_code' => $request->activity_code,
            'activity_name' => $request->activity_name,
        ];

        $query = MasterActivity::create($data);

        if ($query) {
            return redirect()->route('admin.activity.index')->withFlashSuccess(__('Data Created Successfully'));
        } else {
            return redirect()->route('admin.activity.index')->withFlashDanger(__('Data Failed To Create'));
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
        $data = MasterActivity::findOrFail($id);
        return view('admin.activity.edit')->with([
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
            'activity_code' => 'required',
            'activity_name' => 'required',
        ]);

        $data = [
            'activity_code' => $request->activity_code,
            'activity_name' => $request->activity_name,
        ];

        $query = MasterActivity::findOrFail($id)->update($data);

        if ($query) {
            return redirect()->route('admin.activity.index')->withFlashSuccess(__('Data Updated Successfully'));
        } else {
            return redirect()->route('admin.activity.index')->withFlashDanger(__('Data Failed To Update'));
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
        $item = MasterActivity::findOrFail($id);
        $item->delete();
        return redirect()->route('admin.activity.index')->withFlashSuccess(__('Data Deleted Successfully'));
    }

    public function datatable(Request $request)
    {
        $data = MasterActivity::query();
        if(!$request->order[0]['column']){
            $data = $data->orderBy('id', 'asc');
        }
        return DataTables::of($data)
            ->make(true);
    }
}
