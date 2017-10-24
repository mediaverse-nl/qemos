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
    private $request;

//    private

    public function __construct($path, $request)
    {
        $this->path = $path;
        $this->request = $request;
    }

    public function fileUpload()
    {
        $data = [];

        return  $this->request;
//        if ( $this->request->hasFile('image')){
            $image = $request->file('image');
            $ext = $image->getClientOriginalExtension();
            $image->move('images/blog/', $image->getFilename().'.'.$ext);
//
//            $data['size'] = 0;
//            $data['extension'] = $ext;
//            $data['mime'] = $image->getClientMimeType();
//            $data['real_name'] = $image->getClientOriginalName();
//            $data['file_name'] = $image->getFilename().'.'.$ext;
//        }

        return $data;

//        $this->validate($request, [
//            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//        ]);
//
//        $image = $request->file('image');
//
////        dd($image);
//
//        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
//
//        $destinationPath = public_path($this->path);
//
//        $image->move($destinationPath, $input['imagename']);

//        return back()->with('success','Image Upload successful');

    }

}