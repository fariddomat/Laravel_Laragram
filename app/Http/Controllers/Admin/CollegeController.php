<?php

namespace App\Http\Controllers\Admin;

use App\College;
use App\DataTables\CollegeDataTable;
use App\DataTables\UsersDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Calculation\Category;

class CollegeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CollegeDataTable $dataTable)
    {
        return $dataTable->render('admin.college.index');
    }

    public function create()
    {
        return view('admin.college.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required|unique:colleges,name'
        ]);
        College::create([
            'name'=>$request->name
        ]);

        return redirect()->route('admin.colleges.index');
    }

    public function edit($id)
    {
        $college=College::find($id);
        return view('admin.college.edit', compact('college'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required|unique:colleges,name,' . $id
        ]);
        $college=College::find($id);

        $college->update($request->all());

        return redirect()->route('admin.colleges.index');
    }

    public function destroy($id)
    {
        $college=College::find($id);
        if($college){
            $college->delete();
        }
        return redirect()->route('admin.colleges.index');

    }

    public function show($id)
    {
        dd('show');
    }

}
