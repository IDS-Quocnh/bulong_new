<?php

namespace App\Http\Controllers\Admin;

use App\Bulong\Users\User;
use App\Model\BgImage;
use App\Model\BgImageColors;
use App\Model\Categories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BgManagementController extends Controller
{
    public function index(Request $request)
    {
        $list = BgImage::orderBy('created_at','desc')->get();
        if(isset($request->addBackground)){
            return view('BgManagementController.list')->with('susscessMessage', 'background registered successfully')->with('list', $list);
        }
        return view('BgManagementController.list')->with('list', $list);
    }

    public function edit(Request $request)
    {
        if ($request->isMethod('post')) {
            $item = BgImage::find($request->id);
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

            $item = BgImage::find($request->id);
            $name = $item->name;
            $oldImage = $item->image;
            $item->setAttributeMap($request->all());
            if($item->image != $oldImage){
                $item->image = $this->uploadImage($file);
            }
            $item->save();
            $list = BgImage::orderBy('created_at','desc')->get();
            return view('BgManagementController.list')->with('susscessMessage','Background name "' . $name . '" edit successfully')
                ->with('list', $list);
        }else{
            if (!isset($request->id)) {
                return redirect()->route('home');
            }
            $item = BgImage::find($request->id);
            return view('BgManagementController.main')->with('item', $item);
        }
    }

    public function add(Request $request)
    {
        if ($request->isMethod('post')) {
            $file = $request->file('image');
            $item = new BgImage;
            $item->setAttributeMap($request->all());
            $item->image = $this->uploadImage($file);
            $item->save();
            return view('BgManagementController.main')->with('susscessMessage','Add background successfully');
        }else{
            return view('BgManagementController.main');
        }
    }

    public function delete(Request $request)
    {
        $item = BgImage::find($request->id);
        $name = $item->name;
        $item->delete();
        $list = BgImage::orderBy('created_at', 'desc')->get();
        return view('BgManagementController.list')->with('susscessMessage', 'Background name "' . $name . '" deleted successfully')->with('list', $list);
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


    public function indexColors(Request $request)
    {
        $list = BgImageColors::orderBy('created_at','desc')->get();
        if(isset($request->addBackground)){
            return view('BgManagementColorsController.list')->with('susscessMessage', 'background registered successfully')->with('list', $list);
        }
        return view('BgManagementColorsController.list')->with('list', $list);
    }

    public function editColors(Request $request)
    {
        if ($request->isMethod('post')) {
            $item = BgImageColors::find($request->id);
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

            $item = BgImageColors::find($request->id);
            $name = $item->name;
            $oldImage = $item->image;
            $item->setAttributeMap($request->all());
            if($item->image != $oldImage){
                $item->image = $this->uploadImage($file);
            }
            $item->save();
            $list = BgImageColors::orderBy('created_at','desc')->get();
            return view('BgManagementColorsController.list')->with('susscessMessage','Background name "' . $name . '" edit successfully')
                ->with('list', $list);
        }else{
            if (!isset($request->id)) {
                return redirect()->route('home');
            }
            $item = BgImageColors::find($request->id);
            return view('BgManagementColorsController.main')->with('item', $item);
        }
    }

    public function addColors(Request $request)
    {
        if ($request->isMethod('post')) {
            $file = $request->file('image');
            $item = new BgImageColors;
            $item->setAttributeMap($request->all());
            $item->image = $this->uploadImage($file);
            $item->save();
            return view('BgManagementColorsController.main')->with('susscessMessage','Add background successfully');
        }else{
            return view('BgManagementColorsController.main');
        }
    }

    public function deleteColors(Request $request)
    {
        $item = BgImageColors::find($request->id);
        $name = $item->name;
        $item->delete();
        $list = BgImageColors::orderBy('created_at', 'desc')->get();
        return view('BgManagementColorsController.list')->with('susscessMessage', 'Background name "' . $name . '" deleted successfully')->with('list', $list);
    }
}
