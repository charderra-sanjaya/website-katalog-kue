<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.dashboard.posts.index', [
            'posts' => Product::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.dashboard.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|min:3|max:255',
            'slug' => 'required|unique:products|min:3|max:255',
            'description' => 'required',
            'image' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->file('image')) {
            $validateData['image'] = $request->file('image')->store('produk-images');
        }

        Product::create($validateData);
        return redirect()->route('posts.index')->with('success', 'Post created successfully');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::all()->find($id);
        return view('pages.dashboard.posts.edit', [
            'product' => $product,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {

        $data =  $request->except(['_token', '_method']);;

        $item = Product::findOrFail($id);

        if ($request->hasFile('image')) {
            if ($item->image) {
                Storage::delete($item->image);
            }
            $data['image'] = $request->file('image')->store('produk-images');
        }

        $item->update($data);
        return redirect()->route('posts.index')->with('success', 'Post Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Product::findorFail($id);

        if ($item->image) {
            Storage::delete($item->image);
        }

        $item->delete();
        return redirect()->route('posts.index')->with('success', 'Post Deleted successfully');
    }
}
