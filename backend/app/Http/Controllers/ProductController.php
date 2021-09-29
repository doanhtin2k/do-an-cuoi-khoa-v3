<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
//use Illuminate\Support\Facades\Storage;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public  $limit=5;
    public function index()
    {
        //
        $products = Product::orderBy('id', 'DESC')->paginate($this->limit);
        
        return view('component/products/index',[
            'products'=>$products,
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
        $cate = Category::all();
        // dd($cate);
        return view('component/products/create',['cate'=>$cate]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductRequest $request)
    {
        //

        // dd($request->all());
        $product = new Product();
        $product->title = $request->title;
        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->amount = $request->amount;
        $product->size = $request->size;
        $product->Designs = $request->Designs;
        $product->sex = $request->sex;
        $product->promotions = $request->promotions;
        $product->summary = $request->summary;
        $product->content = $request->content;
        $product->seo_title = $request->seo_title;
        $product->seo_description = $request->seo_description;
        $product->seo_keywords = $request->seo_keywords;
        $product->status = $request->status;
        $avatar = $request->avatar;
        $name = time()."_".$avatar->getClientOriginalName();
        //$path = $request->file('avatar')->storeAs('public/uploads',$name);
        $path = $request->file('avatar')->move(public_path('uploads'),$name);
        $product->avatar = $name;
        // dd($product);
        $product->save();
        
        return redirect()->route("product.index");
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
        $product = Product::findOrFail($id);
        return view('component/products/detail',['product'=>$product]);
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
        // dd("DOANH");
        $cate = Category::all();
        $product = Product::findOrFail($id);
        //  dd($product->category->id);
       return view('component/products/edit',['cate'=>$cate,'product'=>$product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, $id)
    {
        //
        $product = Product::findOrFail($id);
        $product->title = $request->title;
        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->amount = $request->amount;
        $product->size = $request->size;
        $product->Designs = $request->Designs;
        $product->sex = $request->sex;
        $product->promotions = $request->promotions;
        $product->summary = $request->summary;
        $product->content = $request->content;
        $product->seo_title = $request->seo_title;
        $product->seo_description = $request->seo_description;
        $product->seo_keywords = $request->seo_keywords;
        $product->status = $request->status;
        if($request['avatar'])
        {
            $avatar = $request['avatar'];
//            if(Storage::exists('uploads/'.$product->avatar))
//            {
//                unlink('storage/uploads/'.$product->avatar);
//            }
            if(file_exists(public_path('uploads/'.$product->avatar)))
            {
                // dd("yes");
                unlink(public_path('uploads/'.$product->avatar));
            }
            $name = time()."_".$avatar->getClientOriginalName();
            //$path = $request->file('avatar')->storeAs('public/uploads',$name);
            $path = $request->file('avatar')->move(public_path('uploads'),$name);
            $product->avatar = $name;
        }
        // dd($product);
        $product->save();
        
        return redirect()->route("product.index");
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
        $product = Product::findOrFail($id);
//        if(Storage::exists('uploads/'.$product->avatar))
//            {
//                unlink('storage/uploads/'.$product->avatar);
//            }
            if(file_exists(public_path('uploads/'.$product->avatar)))
            {
                // dd("yes");
                unlink(public_path('uploads/'.$product->avatar));
            }
        $product->delete();
        return redirect()->back();
    }
}
