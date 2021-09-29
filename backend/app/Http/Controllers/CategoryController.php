<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\CategoryEditRequest;
//use Illuminate\Support\Facades\Storage;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cate = Category::paginate(10);
        return view('component/categories/index',[
            'cate'=>$cate
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('component/categories/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $cate = new Category();
        $cate->name = $request->name;
        $cate->description = $request->description;
        $cate->status = $request->status;
        $avatar = $request['avatar'];
            // $ext = $avatar->getClientOriginalExtension();    // duoi file
            $name = time()."_".$avatar->getClientOriginalName();
            //$path = $request->file('avatar')->storeAs('public/uploads',$name);
            $path = $request->file('avatar')->move(public_path('uploads'),$name);
            $cate->avatar = $name;
        $cate->save();
        return redirect()->route("category.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $cate = Category::findOrFail($id);
        return view("component/categories/detail",['cate'=>$cate]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $cate = Category::findOrFail($id);
        return view("component/categories/edit",['cate'=>$cate]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryEditRequest $request, $id)
    {
        //
        $cate = Category::findOrFail($id);
        $cate->name = $request->name;
        $cate->description = $request->description;
        $cate->status = $request->status;
        if($request['avatar'])
        {
            $avatar = $request['avatar'];
//            if(Storage::exists('uploads/'.$cate->avatar))
//            {
//                unlink('storage/uploads/'.$cate->avatar);
//            }
            if(file_exists(public_path('uploads/'.$cate->avatar)))
            {
                // dd("yes");
                unlink(public_path('uploads/'.$cate->avatar));
            }
            $name = time()."_".$avatar->getClientOriginalName();
            //$path = $request->file('avatar')->storeAs('public/uploads',$name);
            $path = $request->file('avatar')->move(public_path('uploads'),$name);
            $cate->avatar = $name;
        }
        $cate->save();
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $cate = Category::findOrFail($id);
//        if(Storage::exists('uploads/'.$cate->avatar))
//            {
//                unlink('storage/uploads/'.$cate->avatar);
//            }
            if(file_exists(public_path('uploads/'.$cate->avatar)))
            {
                // dd("yes");
                unlink(public_path('uploads/'.$cate->avatar));
            }
        $cate->delete();
        return redirect()->back();
    }
}
