<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    /**
     * for logo upload
     */
    public function logoIndex(){
        $logo= Settings::find(1);
        return view('admin.settings.logo.index',compact('logo'));
    }

    /**
     *  for logo update
     */
    public function logoUpdate(Request $request){
        $logo = $request -> file('logo');
        $old_logo = $request -> old_logo;
        $logo_width = $request -> logo_width;

        $logo_name = '';
        if ($request -> hasFile('logo')){
            $logo_name = md5(time().rand()).'.'.$logo-> getClientOriginalExtension();
            $logo -> move(public_path('media/settings/logo'), $logo_name);
        }else{
            $logo_name = $old_logo;
        }

        $logo_update= Settings::find(1);
        $logo_update -> logo_name = $logo_name;
        $logo_update -> logo_width = $logo_width;
        $logo_update -> update();

        return redirect() -> back() -> with('success','Logo updated successful');
    }

    /**
     * for social add
     */
    public function socialIndex(){
        $settings= Settings::find(1);
        return view('admin.settings.social.index',compact('settings'));
    }

    /**
     * for social Update
     */
    public function socialUpdate(Request $request){
        $social_data = [
            'fb' => $request -> fb,
            'tw' => $request -> tw,
            'lin' => $request -> lin,
            'ins' => $request -> ins,
            'drib' => $request -> drib,
        ];

      $social_json = json_encode($social_data);

        $settings= Settings::find(1);
        $settings -> social = $social_json;
        $settings -> update();
        return redirect() -> back() -> with('success','Social updated successful');
    }



}
