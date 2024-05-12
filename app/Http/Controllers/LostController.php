<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Lost;
use App\Notifications\LoseThings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class LostController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('lostItem', compact('categories'));
    }


       /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        $request->validate([
            'location' => 'required|string|min:3',
            'date' => 'required',
            'description' => 'required|string|min:3',
            'user_id' => 'required|int',
            'category_id' => 'required|int',
        ]);

        $image = $request->file('image')? $request->file('image')->store('lost', 'img'): null;
        Lost::create([
            'location' => $request->location,
            'date' => $request->date,
            'image' => $image,
            'description' => $request->description,
            'user_id' => $request->user_id,
            'category_id' => $request->category_id,
        ]);
        return redirect()->back()->with('success', "Added Successfully, We'll contact you if we find what you are looking for!");
    }

    public function getAllLost(){
        $allLostThings = Lost::where('isfound', 0)->get();
        if(is_null($allLostThings))
            return response()->json(["error"=> 'Not found any Lost things!']);
        else
            return response()->json($allLostThings, 200);
    }

    
    public function delete($id){
        Lost::find($id)->delete();
        return redirect()->back()->with('success', "Deleted Done Successfully !");
    }
}
