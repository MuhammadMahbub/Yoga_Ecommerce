<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LanguageController extends Controller
{
    public function lang_edit(){
        $all_langs = [];
        $s_name = 'fr';
        $file = resource_path('lang/fr.json');
        $data = json_decode(file_get_contents($file), true);
        return view('admin.language.edit', compact('data','all_langs','s_name'));
    }


    public function lang_update(Request $request){
        //  dd($request->all());
        // $request->s_name;
        // $key = $request->key;
        // $value = $request->value;
        // dd($request->all());
        $path = base_path('resources/lang/fr.json');
        $json = json_decode(file_get_contents($path), true);

        // $request->value;
        $json[$request->data_key] = $request->data_value;

        file_put_contents($path, json_encode($json));

        // foreach($json as $key=>$value){

        //     return $json[$key] = $value;
        //     return $new_path = base_path('resources/lang/'.$request->s_name.'.json');
        //     file_put_contents($new_path, json_encode($json));
        // }
        // die();

        // return back()->with('success', 'Updated Successfully');
        return response()->json([
            'success' => 'Updated Successfully',
        ]);
    }
}
