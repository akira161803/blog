<?php

namespace App\Http\Controllers;

use App\Models\post;
use App\Models\Nice;
use Illuminate\Http\Request;
use App\Http\Requests\postRequest;


class postController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = post::with('nices')->with('user')->orderBy("created_at", "desc")->paginate(30);
        return view('top.top', compact('posts'));
    }

    public function myPageAllIndex()
    {
        $posts = post::orderBy("created_at", "desc")->paginate(30);

        return view('myPage.allIndex', compact('posts'));
    }


    public function myPageNiceposts()
    {
        $posts = auth()->user()->posts()->with('nices')->orderBy("created_at", "desc")->paginate(30);

        return view('myPage.niceposts', compact('posts'));
    }

    
    public function myPageMyIndex() 
    {
        $user = auth()->user();
        $posts = post::where('user_id', $user->id)->orderBy("created_at", "desc")->paginate(30);
        return view('myPage.myIndex', compact('posts'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function myPageCreate()
    {
        return view('myPage.create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(postRequest $request)
    {
        \DB::beginTransaction();
        try {
            $post = post::create($request->all());
            \DB::commit();
        } catch(\Throwable $e) {
            \DB::rollback();
            abort(500);
        }
        session()->flash('status', 'submitted');
 
        return redirect(route('top'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function myPageStore(postRequest $request)
    {
        \DB::beginTransaction();
        try {
            $post = new post;
            $post->fill($request->all());
            $post->user_id = auth()->id();
            $post->save();
            
            \DB::commit();
            session()->flash('status', 'm-submitted');
        } catch(\Throwable $e) {
            \DB::rollback();
            abort(500);
        }

        return redirect(route('myPageMyIndex'));
    }




    /**
     * Display the specified resource.
     */
    public function show(post $post)
    {
        //
    }

  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(post $post)
    {
        //
    }


    /**
     * 
     */
    public function filter(Request $request)
    {       
        $postCategory = $request->input('postCategory');
        $typeBCategory = $request->input('typeBCategory');
        $toWhomCategory = $request->input('toWhomCategory');

        //0にすればよくない？
        if($postCategory==100) {
            $postCategory = false;
        }
        if($typeBCategory==100) {
            $typeBCategory = false;
        }
        if($toWhomCategory==100) {
            $toWhomCategory = false;
        }

        $posts = post::when($postCategory, function ($query, $postCategory) {
            return $query->where('postCategory', $postCategory);
        })
        ->when($typeBCategory, function ($query, $typeBCategory) {
            return $query->where('typeBCategory', $typeBCategory);
        })
        ->when($toWhomCategory, function ($query, $toWhomCategory) {
            return $query->where('toWhomCategory', $toWhomCategory);
        })
        ->latest()
        ->paginate(30); 

        return view('top.top', compact('posts'));
    }  


    public function myPageAllIndexFilter(Request $request)
    {       
        $postCategory = $request->input('postCategory');
        $typeBCategory = $request->input('typeBCategory');
        $toWhomCategory = $request->input('toWhomCategory');

        if($postCategory==100) {
            $postCategory = false;
        }
        if($typeBCategory==100) {
            $typeBCategory = false;
        }
        if($toWhomCategory==100) {
            $toWhomCategory = false;
        }

        $posts = post::when($postCategory, function ($query, $postCategory) {
            return $query->where('postCategory', $postCategory);
        })
        ->when($typeBCategory, function ($query, $typeBCategory) {
            return $query->where('typeBCategory', $typeBCategory);
        })
        ->when($toWhomCategory, function ($query, $toWhomCategory) {
            return $query->where('toWhomCategory', $toWhomCategory);
        })
        ->latest()
        ->paginate(30);

        return view('myPage.allIndex', compact('posts'));
    }


    public function myPageMyIndexFilter(Request $request)
    {       
        $postCategory = $request->input('postCategory');
        $typeBCategory = $request->input('typeBCategory');
        $toWhomCategory = $request->input('toWhomCategory');

        if($postCategory==100) {
            $postCategory = false;
        }
        if($typeBCategory==100) {
            $typeBCategory = false;
        }
        if($toWhomCategory==100) {
            $toWhomCategory = false;
        }

        $posts = post::when($postCategory, function ($query, $postCategory) {
            return $query->where('postCategory', $postCategory);
        })
        ->when($typeBCategory, function ($query, $typeBCategory) {
            return $query->where('typeBCategory', $typeBCategory);
        })
        ->when($toWhomCategory, function ($query, $toWhomCategory) {
            return $query->where('toWhomCategory', $toWhomCategory);
        })
        ->latest()
        ->paginate(30); 

        return view('myPage.myIndex', compact('posts'));
    }  


    public function myPageNicepostsFilter(Request $request)
    {       
        $postCategory = $request->input('postCategory');
        $typeBCategory = $request->input('typeBCategory');
        $toWhomCategory = $request->input('toWhomCategory');

        if($postCategory==101) {
            $postCategory = false;
        }
        if($typeBCategory==101) {
            $typeBCategory = false;
        }
        if($toWhomCategory==101) {
            $toWhomCategory = false;
        }

        $posts = auth()->user()->posts()
        ->when($postCategory, function ($query, $postCategory) {
            return $query->where('postCategory', $postCategory);
        })
        ->when($typeBCategory, function ($query, $typeBCategory) {
            return $query->where('typeBCategory', $typeBCategory);
        })
        ->when($toWhomCategory, function ($query, $toWhomCategory) {
            return $query->where('toWhomCategory', $toWhomCategory);
        })
        ->latest()
        ->paginate(30);

        return view('myPage.niceposts', compact('posts'));
    }  


    public function myPageDelete($id) 
    {
        $post = post::find($id);
        $post->delete();
        return redirect()->route('myPageMyIndex')->with('message', '削除しました。');
    }

}
