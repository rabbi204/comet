<?php

namespace App\Http\Controllers;

use App\Models\HomePage;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    /**
     * slider index
     */
    protected function index(){
        $sliders = HomePage::find(1);
        return view('admin.pages.home.sliders.index', [
            'slider' =>$sliders
        ]);
    }

    /**
     * slider store
     */
    protected function sliderStore(Request $request){

        $slider_num = count($request -> subtitle);

        $slider= [];
        for ($i = 0; $i < $slider_num; $i++){
            $slide_arr =[
                'slide_code'    => $request -> slide_code[$i],
                'subtitle'    => $request -> subtitle[$i],
                'title'    => $request -> title[$i],
                'btn1_title'    => $request -> btn1_title[$i],
                'btn1_link'    => $request -> btn1_link[$i],
                'btn2_title'    => $request -> btn2_title[$i],
                'btn2_link'    => $request -> btn2_link[$i],
            ];
            array_push($slider,$slide_arr);
        }

        $slider_array = [
            'svideo' => $request -> slider_url,
            'slider' => $slider
        ];

        $slider_json = json_encode($slider_array);

       $slider_data = HomePage:: find(1);
       $slider_data -> sliders = $slider_json;
       $slider_data -> update();

       return redirect()-> back() -> with('success','Slider Added Successful');
    }


}
