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
        $errors = [
            'code' => 0,
            'message' => null,
        ];
        $file = $request->excel_upload;
        $fileName = $file->getClientOriginalName();

        try {
            \Excel::load($file, function ($reader) {

            });
            $errors['message'] = 'Users uploaded successfully.';
        } catch (\Exception $e) {
            $errors['code'] = 100;
            $errors['message'] = $e->getMessage();
        }

        return redirect(route('excel'))->with('flash_message', json_encode($errors, true));
    }
}
