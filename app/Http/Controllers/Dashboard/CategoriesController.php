<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

// use Illuminate\Facade\Redirect;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('dashboard.Categories.index', compact('categories')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $parents = Category::all();

        return view('dashboard.Categories.create' , compact('parents'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required |string | min:2| max:25',
            'parent_id'=> 'nullable | exists:categories,id',
            'image' => 'image | max:1048576'
        ]);

        $request->merge([
            "slug"=>Str::slug($request->name)
        ]);
        $data = $request->except('image');

        if($request->hasFile('image')){
            $file = $request->file('image');
            $path = $file->store('uploads', 'public');
            // dd($path);
            $data['image'] = $path;
        }



        $category = Category::create($data);

        return  redirect()->route('categories.index')
        ->with('success' , 'Stored Successfully');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::findOrFail($id);
        return view('dashboard..Categories.show' , compact('category'));
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::findOrFail($id);

        //SELECT * FROM categories
        // WHERE id != $id AND
        //  parent_id != $id or parent_id IS NULL

        // $parents = Category::where('id' , '!=' , $id)
        // ->where(function($query)use($id){
        //     $query->whereNull('parent_id')
        //     ->orWhere('parent_id' , '!=' , $id );
        // });

        $parents = Category::where('id' , '<>' , $id)
        ->where('parent_id','<>' ,$id)->get();

         return view('dashboard.Categories.edit' , compact('category' , 'parents'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required |string | min:2| max:25',
            'parent_id'=> 'nullable | exists:categories,id',
            'image' => 'image | max:1048576'
        ]);
        $category = Category::findOrFail($id);
        $old_image = $category->image;

        $data= $request->except('image');
        if($request->hasFile('image')){
            $file = $request->file('image');
            $path = $file->store('uploads' , "public");
            $data['image'] = $path;
        }


        $category->update($data);

        if($old_image && isset($data['image'])){
            Storage::disk('public')->delete($old_image);
        }

        return  redirect()->route('categories.index')
        ->with('updated' , 'Updated successfully !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);

        $category->delete();

        return  redirect()->route('categories.index')
        ->with('deleted' , 'Deleted successfully !');
    }
    
//Soft delete Actions

    public function trashed(){
        $categories= Category::onlyTrashed()->get();
        return view('dashboard.Categories.index', compact('categories')); 
    }
    
    
    public function restore(Request $request , $id){
   
        $category= Category::onlyTrashed()->findOrFail($id);
        $category->restore();
        
        $categories = Category::all();
        
        return view('dashboard.Categories.index', compact('categories'))
            ->with('success', 'category is restored'); 
    }
    
    public function forceDelete($id){
        $category= Category::onlyTrashed()->findOrFail($id);

        $image =  $category->image;
        if($image !== null){
            Storage::disk('public')->delete($image);
        }
        $category->forceDelete();
        $categories = Category::all();
        
        return view('dashboard.Categories.index', compact('categories'))
        ->with('success', 'category is forceDeleted'); ; 
    }

}