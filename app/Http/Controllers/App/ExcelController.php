<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ExcelUploadRequest;

class ExcelController extends Controller
{
    public function index()
    {
        return view('app.excel');
    }

    public function handle(ExcelUploadRequest $request)
    {
        $status = [
            'code' => 0,
            'message' => null,
        ];
        $file = $request->excel_upload;
        $fileName = $file->getClientOriginalName();
        $path = 'uploads/excel/temp/';
        $destinationPath = public_path($path);

        if (! \File::isFile($destinationPath . $fileName)) {
            $file->move($destinationPath , $fileName);
        }

        try {
            \Excel::load($path . $fileName, function ($reader) {
                dd($reader->get());
            });
            $status['message'] = 'Users uploaded successfully.';
        } catch (\Exception $e) {
            dd($e);
            $status['code'] = 100;
            $status['message'] = $e->getMessage();
        }

        return redirect(route('excel'))->with('flash_message', json_encode($status, true));
    }
}
