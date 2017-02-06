<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ImageController extends Controller
{
    public function index()
    {

        return view('app.image');
    }

    public function handle(Request $request)
    {
        $this->validate($request, [
            'width' => "required|numeric",
            'height' => "required|numeric",
            'image' => 'required|image|mimes:jpeg,jpg,gif,bmp,png|max:3200',
        ]);
        $file = $request->image;

        $width = $request->width;
        $height = $request->height;

        $fileName = $file->getClientOriginalName();

        if(!\File::exists(public_path('uploads/images/resize'))) {
            \File::makeDirectory(public_path('uploads/images/resize'), $mode = 0755, true, true);
        }

        $name = pathinfo($fileName, PATHINFO_FILENAME);
        $ext = pathinfo($fileName, PATHINFO_EXTENSION);
        $path = 'uploads/images/resize/' . $name . '-' . $width . 'x' . $height . '.' . $ext;
        $destinationPath = public_path($path);

        if ( ! \File::isFile($destinationPath) ) {
            $imageResize = \Image::make($file)->fit($width, $height)->save($destinationPath);
        }

        if ($request->has('download')) {
            return response()->download($destinationPath, $fileName, array('Content-Type' => $ext));
        } else {
            $compacts['imageResize'] = asset($path);
            $compacts['width'] = $width;
            $compacts['height'] = $height;
            $compacts['fileName'] = $fileName;
            
            return view('app.image', $compacts);
        }

    }
}
