<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\ContactInfoItem;
use App\Models\BlogCategory;
use App\Models\about;
use App\Models\Volunteer;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Intervention\Image\ImageManager;

class AboutPageController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function category()
    {
        $all_category = about::all()->groupBy('lang');
        $all_language = Language::all();
        return view('backend.pages.about.category')->with([
            'all_category' => $all_category,
            'all_language' => $all_language
        ]);
    }

    public function new_category(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',

        ]);

        about::create($request->all());

        return redirect()->back()->with([
            'msg' => 'New Category Added...',
            'type' => 'success'
        ]);
    }

    public function update_category(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',

        ]);

        about::find($request->id)->update([
            'title' => $request->title,
            'header' => $request->header,
            'description' => $request->description,

        ]);

        return redirect()->back()->with([
            'msg' => 'Category Update Success...',
            'type' => 'success'
        ]);
    }

    public function delete_category(Request $request, $id)
    {
        if (Blog::where('blog_categories_id', $id)->first()) {
            return redirect()->back()->with([
                'msg' => 'You Can Not Delete This Category, It Already Associated With A Post...',
                'type' => 'danger'
            ]);
        }
        about::find($id)->delete();
        return redirect()->back()->with([
            'msg' => 'about Delete Success...',
            'type' => 'danger'
        ]);
    }

    public function Language_by_slug(Request $request)
    {
        $all_category = about::where('lang', $request->lang)->get();

        return response()->json($all_category);
    }

}
