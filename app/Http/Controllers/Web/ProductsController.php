<?php

namespace App\Http\Controllers\Web;

use DB;
use Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ImagesProduct;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(10);
        
        return view('admin.master.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.master.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        DB::beginTransaction();

        try {
            //menyimpan data product

            $product = Product::create([
                //kolom-di-tabel => inputan-user
                "product" =>$request->product,
                "price" =>$request->price,
                "stock" =>$request->stock,
                "description" =>$request->description, 
            ]);
            if ($request->hasFile('images')) {

                $arrayImages = [];
                foreach ($request->images as $value) {
                    $path = $value->store('product');

                    $columnsImage = [
                        "product_id" => $product->id,
                        "image" => $path,
                    ];

                    array_push($arrayImages,$columnsImage);
                }
                ImagesProduct::insert($arrayImages);
            }
            
            DB::commit();
        } catch (\Exeption $e) {
            DB::rollback();
            dd($e);
        }
        return redirect()->route('product.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $product = product::with(['imageRelation'])->find($id);

      return view('admin.master.product.detail', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = product::find($id);

        return view('admin.master.product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = product::find($id);
        $oldImages = ImagesProduct::where('product_id',$id)->get();
        DB::beginTransaction();

        try {
            //menyimpan data product

            $product ->update([
                //kolom-di-tabel => inputan-user
                "product" =>$request->product,
                "price" =>$request->price,
                "stock" =>$request->stock,
                "description" =>$request->description, 
            ]);
            if ($request->hasFile('images')) {

                if (count($oldImages)>= 0) {
                    
                    foreach ($oldImages as $old) {
                        Storage::delete($old->image);
                    }
                    ImagesProduct::where('product_id',$id)->delete();
                }

                $arrayImages = [];
                foreach ($request->images as $value) {
                    $path = $value->store('product');

                    $columnsImage = [
                        "product_id" => $product->id,
                        "image" => $path,
                    ];

                    array_push($arrayImages,$columnsImage);
                }
                ImagesProduct::insert($arrayImages);
            }
            
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            dd($e);
        }
        return redirect()->route('product.index');
        
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $product = product::find($id);
        if (!$product) {
         abort(404);   
        }
        $oldImages = ImagesProduct::where('product_id',$id)->get();
        if (count($oldImages)>= 0) {
                    
            foreach ($oldImages as $old) {
                Storage::delete($old->image);
            }
            ImagesProduct::where('product_id',$id)->delete();
        }

        $product->delete();

        return redirect()->route("product.index");
    }
    

}