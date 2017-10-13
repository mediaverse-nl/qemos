<?php
/**
 * Created by PhpStorm.
 * User: master
 * Date: 10/8/2017
 * Time: 6:10 AM
 */

namespace App\Helper;

use Validator;
//use Input;
use Illuminate\Http\Request;

class FileUpload
{
    private $path;

//    private

    public function __construct($path)
    {
        $this->path = $path;
    }

    public function fileUpload(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $image = $request->file('image');

//        dd($image);

        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

        $destinationPath = public_path($this->path);

        $image->move($destinationPath, $input['imagename']);

//        return back()->with('success','Image Upload successful');

    }

}