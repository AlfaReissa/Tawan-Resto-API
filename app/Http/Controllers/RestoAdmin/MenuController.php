<?php

namespace App\Http\Controllers\RestoAdmin;

use App\Helper\RazkyFeb;
use App\Http\Controllers\Controller;
use App\Models\CuisineCategory;
use App\Models\FoodMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     */
    public function viewCreate()
    {
        $datas = FoodMenu::where("id_resto",'=',Auth::user()->id)->get();
        $cuisines = CuisineCategory::where("id_resto","=",Auth::user()->id)->get();


        return view('admin_resto.menu.create')->with(compact('datas','cuisines'));
    }

    /**
     * Show the form for managing existing resource.
     *
     */
    public function viewManage()
    {
        $datas = FoodMenu::where("id_resto",'=',Auth::user()->id)->get();
        return view('admin_resto.menu.manage')->with(compact('datas'));
    }

    /**
     * Show the edit form for editing armada
     *
     * @return \Illuminate\Http\Response
     */
    public function viewUpdate($id)
    {
        $data =  FoodMenu::findOrFail($id);
        $cuisines = CuisineCategory::where("id_resto","=",Auth::user()->id)->get();

        return view('admin_resto.menu.edit')->with(compact('data','cuisines'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $data = new FoodMenu();
        $data->id_resto = $request->id_resto;
        $data->id_cuisine = $request->id_cuisine;
        $data->name = $request->name;
        $data->desc = $request->desc;
        $data->price = $request->price;

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension(); // you can also use file name
            $fileName = time() . '.' . $extension;

            $savePath = "/web_files/food_menu_thumbnail/";
            $savePathDB = "$savePath$fileName";
            $path = public_path() . "$savePath";
            $file->move($path, $fileName);

            $photoPath = $savePathDB;
            $data->thumbnail = $photoPath;
        }


        if ($data->save()) {
            return back()->with(["success" => "Data saved successfully"]);
        } else {
            return back()->with(["error" => "Saving process failed"]);
        }
    }

    public function update(Request $request,$id)
    {
        $data = FoodMenu::findOrFail($id);
        $data->id_resto = $request->id_resto;
        $data->id_cuisine = $request->id_cuisine;
        $data->is_available = $request->is_available;
        $data->name = $request->name;
        $data->desc = $request->desc;
        $data->price = $request->price;


        if ($request->hasFile('photo')) {

            $file_path = public_path() . $data->photo;
            RazkyFeb::removeFile($file_path);

            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension(); // you can also use file name
            $fileName = time() . '.' . $extension;


            $savePath = "/web_files/food_menu_thumbnail/";
            $savePathDB = "$savePath$fileName";
            $path = public_path() . "$savePath";
            $file->move($path, $fileName);

            $photoPath = $savePathDB;
            $data->thumbnail = $photoPath;
        }


        if ($data->save()) {
            return back()->with(["success" => "Data saved successfully"]);
        } else {
            return back()->with(["error" => "Saving process failed"]);
        }
    }

    /**
     * Delete Armada by filling deleted_by_id
     * @param @id of armada
     * return json or view
     */
    public function delete(Request $request,$id){
        $armada =  FoodMenu::findOrFail($id);
        $armada->deleted_by = Auth::id();

        if ($armada->save()) {
            if ($request->is('api/*'))
                return RazkyFeb::responseSuccessWithData(
                    200, 1, 200,
                    "Berhasil Mengupdate Data",
                    "Success",
                    Auth::user(),
                );
            return back()->with(["success"=>"Berhasil Mengupdate Data"]);
        }else{
            if ($request->is('api/*'))
                return RazkyFeb::responseErrorWithData(
                    200, 3, 400,
                    "Berhasil Mengupdate Data",
                    "Success",
                    ""
                );
            return back()->with(["errors"=>"Gagal Mengupdate Data"]);
        }

    }


    public function get(){
        $datas =  FoodMenu::all();
        return $datas;
    }
}
