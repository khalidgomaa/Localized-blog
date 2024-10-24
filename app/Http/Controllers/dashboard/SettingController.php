<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class SettingController extends Controller
{
    public function update(Request $request){
        $rules=[
            "logo"=> "nullable|image|mimes:jpg,png,jpeg,gif|max:1024",
            "favicon"=> "nullable|image|mimes:jpg,png,jpeg,gif|max:1024",
            "facebook"=> "nullable|string",
            "instagram"=> "nullable|string",
            "email"=> "nullable|string|email",
            "phone"=> "nullable|numeric ",

        ];
        foreach(config('app.languages') as $key=>$value){
            $rules["$key.title"] = "required|string";
            $rules["$key.content"] = "nullable|string";
            $rules["$key.address"] = "nullable|string";
        }
        $validatedData = $request->validate($rules);

        if ($request->hasFile('logo')) {
            $originalLogoName = $request->file('logo')->getClientOriginalName();         
            $request->file('logo')->storeAs('images', $originalLogoName, 'public');
            
            $validatedData['logo'] = $originalLogoName;
        }
        
        if ($request->hasFile('favicon')) {
            $originalFaviconName = $request->file('favicon')->getClientOriginalName();
            $request->file('favicon')->storeAs('images', $originalFaviconName, 'public');
            
            $validatedData['favicon'] = $originalFaviconName;
        }
        
       
            Setting::updateOrCreate(
                ['id' => 1], 
                $validatedData
            );
        
       
            return redirect()->back()->with('success', 'Settings updated successfully.');

}
}
