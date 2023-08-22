<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Job;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function category(){
        $categories=Category::all();
        return view('category.category',compact('categories'));
    }

    public function create_category(){
      
        return view('category.create_category');
     }

     public function store_category(Request $request)
     {
         $request->validate([
             'name' => 'required',
            
         ]);
 
      
 
         
         $category = new Category();
         $category->name = $request->input('name');
    
     
 
         // Save the job to the database
         $category->save();
 
         // Redirect to the job view page or any other desired page
         return redirect()->route('category');
     }

     
     public function delete(string $id)
     {
         $categories = Category::find($id);
         $categories->delete();
         return redirect()->back();
     }

     public function update_category($id)
     {
     $category = Category::find($id);
         return view('category.update_category', compact('category'));
     }
 
     public function edit_category(Request $request, $id)
     {
         $category = Category::find($id);
         $category->name = $request->name;
         
    
         $category->save();
         return redirect()->back()->with('message', 'category  updated succesfully');
     }


     public function category_single($name){
        $category = Category::where('name', $name)->first();

        // Check if the category exists
        if (!$category) {
            return redirect()->route('category')->with('error', 'Category not found');
        }

        // Get all jobs belonging to the given category
        $jobs = Job::where('category_id', $category->id)->get();

        return view('category.single', compact('category', 'jobs'));
     }
}
