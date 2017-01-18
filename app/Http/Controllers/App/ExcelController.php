<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ExcelUploadRequest;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    public function index()
    {
        return view('app.excel');
    }

    public function handle(ExcelUploadRequest $request)
    {
        $file = $request->excel_upload;
        $fileName = $file->getClientOriginalName();

        try {
            Excel::load($file, function ($reader) {

            });
            \Session::flash('success', 'Users uploaded successfully.');
        } catch (\Exception $e) {
            \Session::flash('error', $e->getMessage());
        }

        return redirect(route('excel'));
    }
}
