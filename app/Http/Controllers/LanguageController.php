<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index(){
        $all_lang = Language::all();
        return view('backend.languages.index')->with([
            'all_lang' => $all_lang
        ]);
    }
    public function store(Request $request){
        $this->validate($request,[
            'name' =>  'required|string:max:191',
            'slug' => 'required|string:max:191'
        ]);
        Language::create([
           'name' => $request->name,
           'slug' => $request->slug,
           'default' => 0
        ]);
        $default_lang_data = file_get_contents(resource_path('lang').'/default.json');
        file_put_contents(resource_path('lang/').$request->slug.'.json',$default_lang_data);
        return redirect()->back()->with([
            'msg' => 'New Language Added Success...',
            'type' => 'success'
        ]);
    }

    public function edit_words($id){
        $all_word = file_get_contents(resource_path('lang/').$id.'.json');
        return view('backend.languages.edit-words')->with([
            'all_word' => json_decode($all_word),
            'lang_slug' => $id
        ]);
    }

    public function update_words(Request $request,$id){
        $lang = Language::where('slug',$id)->first();
        $content = json_encode($request->word);
        if ($content === 'null') {
            return back()->with(['msg' => 'Please fill one minimum one field','type' => 'danger']);
        }
        file_put_contents(resource_path('lang/') . $lang->slug . '.json', $content);
        return back()->with(['msg' => 'Words Change Success','type' => 'success']);
    }
    public function update(Request $request){
        $this->validate($request,[
            'name' =>  'required|string:max:191',
            'slug' => 'required|string:max:191'
        ]);
        Language::where('id',$request->id)->update([
            'name' => $request->name,
            'slug' => $request->slug
        ]);
        $default_lang_data = file_get_contents(resource_path('lang').'/default.json');
        file_put_contents(resource_path('lang/').$request->slug.'.json',$default_lang_data);
        return redirect()->back()->with([
            'msg' => 'Language Update Success...',
            'type' => 'success'
        ]);
    }
    public function delete(Request $request, $id){
         Language::find($id)->delete();
        return redirect()->back()->with([
            'msg' => 'Language Delete Success...',
            'type' => 'danger'
        ]);
    }
    public function make_default(Request $request, $id){
        Language::where('default' ,1)->update(['default' => 0]);
        Language::find($id)->update(['default' => 1]);
        $lang = Language::find($id);
        $lang->default = 1;
        $lang->save();
        session()->put('lang',$lang->slug);
        return redirect()->back()->with([
            'msg' => 'Default Language Set To '.$lang->name,
            'type' => 'success'
        ]);
    }
}
