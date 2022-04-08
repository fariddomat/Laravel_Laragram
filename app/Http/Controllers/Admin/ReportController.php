<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ReportDataTable;
use App\Http\Controllers\Controller;
use App\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(ReportDataTable $dataTable)
    {
        return $dataTable->render('admin.reports.index');
    }


    public function reportCheck($id)
    {
        $reports=Report::find($id);
        if ($reports) {
            $reports->status="done";
            $reports->save();
        }
        return redirect()->back();
    }

}
