<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {

        $categories = Category::all();
        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {

        $category = New Category();
        $action =  route('category.store');
        return view('category.form', compact('action', 'category'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(CategoryRequest $request)
    {

        $data = $request->validated();

        Category::create($data);

        return response()->json(["massage"=> __('custom.createdSuccessfully'),"path"=> route("category.index")],201);
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

        $category = Category::find($id);
        $action = route("category.update",$id);
        return view('category.form', compact('action', 'category'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(CategoryRequest $request, $id)
    {

        $data = $request->validated();

        $category = Category::find($id);
        $category->update($data);
        return response()->json(["massage"=> __('custom.createdSuccessfully'),"path"=> route("category.index")],201);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {

        $category = Category::find($id);
        $category->delete();
        return redirect()->back();
    }
}
