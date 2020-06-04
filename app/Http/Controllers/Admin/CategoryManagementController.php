<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Model\Categories;
use App\Http\Controllers\Controller;

class CategoryManagementController extends Controller
{
    public function index(Request $request)
    {
    $list = Categories::orderBy('created_at','desc')->get();
    if(isset($request->addCategory)){
        return view('CategoryManagementController.list')->with('susscessMessage', 'category registered successfully')->with('list', $list);
    }
    return view('CategoryManagementController.list')->with('list', $list);
}

    public function edit(Request $request)
    {
        if ($request->isMethod('post')) {
            $item = Categories::find($request->id);
            $keyUnikey ="";
            if($request->name ==  $item->name){
                $keyUnikey = "required|min:3";
            } else{
                $keyUnikey = "required|unique:categories|min:3";
            }
            $request->validate([
                'name' => $keyUnikey,
            ]);


            $file = $request->file('image');

            $item = Categories::find($request->id);
            $name = $item->name;
            $oldImage = $item->image;
            $item->setAttributeMap($request->all());
            if($item->image != $oldImage){
                $item->image = $this->uploadImage($file);
            }
            $item->slug = str_replace(" ","-",$item->name);
            $item->save();
            $list = Categories::orderBy('created_at','desc')->get();
            return view('CategoryManagementController.list')->with('susscessMessage','Category name "' . $name . '" edit successfully')
                ->with('list', $list);
        }else{
            if (!isset($request->id)) {
                return redirect()->route('home');
            }
            $item = Categories::find($request->id);
            return view('CategoryManagementController.main')->with('item', $item);
        }
    }

    public function add(Request $request)
    {
        if ($request->isMethod('post')) {

            $request->validate([
                'name' => 'required|unique:categories|min:3',
                'image' => 'required'
            ]);

            $file = $request->file('image');
            $item = new Categories;
            $item->setAttributeMap($request->all());
            $item->image = $this->uploadImage($file);
            $item->slug = str_replace(" ","-", $item->name);
            $item->save();
            return view('CategoryManagementController.main')->with('susscessMessage','Add category successfully');
        }else{
            return view('CategoryManagementController.main');
        }
    }

    public function delete(Request $request)
    {
        $item = Categories::find($request->id);
        $name = $item->name;
        $item->delete();
        $list = Categories::orderBy('created_at', 'desc')->get();
        return view('CategoryManagementController.list')->with('susscessMessage', 'Category name "' . $name . '" deleted successfully')->with('list', $list);
    }

    public function uploadImage($file){
        $destinationPath = 'uploads';
        $fileId=uniqid();
        $fileName=$file->getClientOriginalName();
        $parts = explode('.', $fileName);
        $fileName= uniqid();
        $extent = $parts[count($parts) - 1];
        $file->move($destinationPath . "/" . $fileId ,$fileName . "." . $extent);
        $filePath = $destinationPath . "/" . $fileId  .'/'.$fileName . "." . $extent;
        return $filePath;
    }
}
