<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\sign_up;
use App\Models\BlogCategory;
use App\Models\Language;
use App\Models\Volunteer;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Intervention\Image\ImageManager;
class sign_upController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $all_sign_up = sign_up::all()->groupBy('lang');
        return view('backend.pages.sign_up.index')->with([
            'all_blog' => $all_sign_up
        ]);
    }

    public function edit_blog($id)
    {
        $blog_sign_up = sign_up::find($id);
        return view('backend.pages.sign_up.edit')->with([
            'blog_sign_up' => $blog_sign_up,
        ]);
    }
    public function update_blog(Request $request, $id)
    {
        $this->validate($request, [
            'email' => 'required',
        ]);
        sign_up::where('id', $id)->update([
            'email' => $request->email,
        ]);


        return redirect()->back()->with([
            'msg' => 'Blog sign up updated...',
            'type' => 'success'
        ]);
    }
    public function delete_blog(Request $request, $id)
    {
        $blog_post = sign_up::find($id);

        $blog_post->delete();
        return redirect()->back()->with([
            'msg' => 'sign_up Post Delete Success...',
            'type' => 'danger'
        ]);
    }



    public function Language_by_slug(Request $request)
    {
        $all_category = BlogCategory::where('lang', $request->lang)->get();

        return response()->json($all_category);
    }
}
