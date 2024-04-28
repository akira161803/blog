<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\post;
use App\Models\Nice;
use Illuminate\Support\Facades\Auth;

class NiceController extends Controller
{
    public function nice(post $post)
    {
        $nice = new Nice();
        $nice->post_id = $post->id;
        if(Auth::check()){
            $nice->user_id = Auth::user()->id;
        }
        $nice->save();

        session()->flash('status', 'submitted');
        return response()->json(['status' => 'Nice added']);
    }

    public function unnice(post $post)
    {
        $nice = Nice::where('post_id', $post->id)->where('user_id', Auth::user()->id)->first();
        if ($nice) {
            $nice->delete();
            return response()->json(['status' => 'Nice removed']);
        }
    
        return response()->json(['status' => 'Nice not found'], 404);
    }    
}
