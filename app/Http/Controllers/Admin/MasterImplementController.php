<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MasterImplement;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;

class MasterImplementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.implement.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.implement.create');
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
            'implement_code' => 'required',
            'implement_name' => 'required',
        ]);

        $data = [
            'implement_code' => $request->implement_code,
            'implement_name' => $request->implement_name,
        ];

        $query = MasterImplement::create($data);

        if ($query) {
            return redirect()->route('admin.implement.index')->withFlashSuccess(__('Data Created Successfully'));
        } else {
            return redirect()->route('admin.implement.index')->withFlashDanger(__('Data Failed To Create'));
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
        $data = MasterImplement::findOrFail($id);
        return view('admin.implement.edit')->with([
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
            'implement_code' => 'required',
            'implement_name' => 'required',
        ]);

        $data = [
            'implement_code' => $request->implement_code,
            'implement_name' => $request->implement_name,
        ];

        $query = MasterImplement::findOrFail($id)->update($data);

        if ($query) {
            return redirect()->route('admin.implement.index')->withFlashSuccess(__('Data Updated Successfully'));
        } else {
            return redirect()->route('admin.implement.index')->withFlashDanger(__('Data Failed To Update'));
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
        $data = MasterImplement::findOrFail($id);
        $data->delete();
        return redirect()->route('admin.implement.index')->withFlashSuccess(__('Data Deleted Successfully'));
    }

    public function datatable(Request $request)
    {
        $data = MasterImplement::query();
        if(!$request->order[0]['column']){
            $data = $data->orderBy('id', 'asc');
        }
        return DataTables::of($data)
            ->make(true);
    }
}
