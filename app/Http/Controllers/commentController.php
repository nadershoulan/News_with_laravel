<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\comment;
use App\Models\BlogCategory;
use App\Models\replay;
use App\Models\Language;
use App\Models\Volunteer;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Intervention\Image\ImageManager;



class commentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {

        $all_comment = comment::all()->groupBy('lang');
        $all_blog2 = Blog::all();
        $all_blog2 = Blog::all();
        $all_replay = replay::all();

        return view('backend.pages.comment.index')->with([
            'all_blog' => $all_comment,
            'all_blog2'=> $all_blog2,
            'all_replay'=> $all_replay
        ]);
    }

    public function edit_blog($id)
    {
        $blog_comment = comment::find($id);
        return view('backend.pages.comment.edit')->with([
            'blog_comment' => $blog_comment,
        ]);
    }
    public function update_blog(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',

        ]);
        replay::find($request->id)->update([
            'comment_id' => $request->id,
            'replay_text' => $request->replay_text,
            // 'replay_admin' => $request->replay_admin
        ]);
        comment::find($request->id)->update([
            'name' => $request->name,
            'comment' => $request->comment,
            'publish' => $request->btn_01_status
        ]);


        return redirect()->back()->with([
            'msg' => ' comment updated...',
            'type' => 'success'
        ]);
    }
    public function delete_blog(Request $request, $id)
    {
        $blog_post = comment::find($id);

        $blog_post->delete();
        return redirect()->back()->with([
            'msg' => 'comment Post Delete Success...',
            'type' => 'danger'
        ]);
    }



    public function Language_by_slug(Request $request)
    {
        $all_category = BlogCategory::where('lang', $request->lang)->get();

        return response()->json($all_category);
    }
}
