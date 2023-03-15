<?php

namespace App\Http\Controllers;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();

        $products = Product::all();

        if($request->category != '' && $request->product){

            $products = Product::where('category_id', $request->category)
            ->where('name', 'like', '%'.$request->product.'%')->get();
        }
        if ($request->category) {
            $products = Product::where('category_id', $request->category)->get();

        }
        if ($request->product) {

            $products = Product::where('name', 'like', '%'.$request->product.'%')->get();
        }

        return view('product.index', compact('products', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $categories = Category::get();
        $product = New Product();
        $action =  route('product.store');
        return view('product.form', compact('action', 'product', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(ProductRequest $request)
    {

        $data = $request->validated();

        if($request->has('image')) { // check if request has image and call trait function for Upload Image

            $data['image'] = uploadImage($request->file("image"), "/assets/upload/product");
        }

        Product::create($data);

        return response()->json(["massage"=> __('custom.createdSuccessfully'),"path"=> route("product.index")],201);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {

        // return view('mainadmin::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $categories = Category::get();
        $product = Product::find($id);
        $action = route("product.update",$id);
        return view('product.form', compact('action', 'product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(ProductRequest $request, $id)
    {

        $data = $request->validated();

        if($request->has('image')) { // check if request has image and call trait function for Upload Image
            $data['image'] = uploadImage($request->file("image"), "/assets/upload/product");
        }
        $product = Product::find($id);
        $product->update($data);
        return response()->json(["massage"=> __('custom.createdSuccessfully'),"path"=> route("product.index")],201);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {

        $product = Product::find($id);
        $product->delete();
        return redirect()->back();
    }
}
