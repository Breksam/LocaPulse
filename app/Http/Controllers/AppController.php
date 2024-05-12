<?php

namespace App\Http\Controllers;

use App\Models\Found;
use App\Models\Lost;
use App\Models\MatchedItem;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class AppController extends Controller
{
    public function home(){
        return view('home');
    }

    public function acconunt(){
        $founds = Found::where('user_id', Auth::user()->id)->where('isfound', 0)->get();
        $losts = Lost::where('user_id', Auth::user()->id)->where('isfound', 0)->get();

        // AI Model - API LINK
        $response = Http::get('https://663a56351ae792804beef3b5.mockapi.io/api/matchedItems')->json();

        if($response){
            foreach($response as $data){
                $dataItem = MatchedItem::where('found_id',$data['found_id'])->where('lost_id', $data['lost_id'])->get();
                if($dataItem->isEmpty()){
                    MatchedItem::create([
                        'user_found' => $data['user_found'],
                        'user_missing' => $data['user_missing'],
                        'found_id' => $data['found_id'],
                        'lost_id' => $data['lost_id'],
                    ]);
                }
            }
        }

        $userMissing = MatchedItem::where('user_missing', Auth::user()->id)->where('isfound', 0)->where('ismatch', 1)->get();
        $userFoundHisItem = MatchedItem::where('user_missing', Auth::user()->id)->where('isfound', 1)->where('ismatch', 1)->get();

        $userFound = MatchedItem::where('user_found', Auth::user()->id)->where('isfound', 0)->where('ismatch', 1)->get();
        $userFoundUserMissing = MatchedItem::where('user_found', Auth::user()->id)->where('isfound', 1)->where('ismatch', 1)->get();

        return view('my-account', compact('founds', 'losts', 'userMissing', 'userFound', 'userFoundHisItem', 'userFoundUserMissing'));  
    }

    public function yes($id){

            $matchedItem = MatchedItem::find($id);
            $matchedItem->update([
                'isfound' => 1
            ]);
    
            $foundItem =Found::find($matchedItem->found_id);
            $foundItem->isfound = 1;
            $foundItem->save();

            $lostItem = Lost::find($matchedItem->lost_id);
            $lostItem->isfound = 1;
            $lostItem->save();

        return redirect()->back();
    }

    public function no($id){
        $matchedItem = MatchedItem::find($id);
        $matchedItem->isfound = 1;
        $matchedItem->ismatch = 0;
        $matchedItem->save();
 
        return redirect()->back()->with('research', "Good Luck, We'll contact you again if find your item!");
    }
}
