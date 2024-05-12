<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Found;
use App\Notifications\FoundThings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
// use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Notification as Notification;

class FoundController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('foundItem', compact('categories'));
    }

       /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        $request->validate([
            'location' => 'required|string|min:3',
            'date' => 'required',
            'image' => 'required',
            'description' => 'required|string|min:3',
            'user_id' => 'required|int',
            'category_id' => 'required|int',
        ]);
        $image = $request->file('image')->store('found', 'img');
        Found::create([
            'location' => $request->location,
            'date' => $request->date,
            'image' => $image,
            'description' => $request->description,
            'user_id' => $request->user_id,
            'category_id' => $request->category_id,
        ]);
        return redirect()->back()->with('success', "Added Successfully, We'll contact you if we find its owner!");
    }
 
    public function getAllFound(){
        $allFoundThings = Found::where('isfound', 0)->get();
        if(is_null($allFoundThings))
            return response()->json(["error"=> 'Not found any found things!']);
        else
            return response()->json($allFoundThings,200);
    }
    
    public function delete($id){
        Found::find($id)->delete();
        return redirect()->back()->with('success', "Deleted Done Successfully !");
    }
}
