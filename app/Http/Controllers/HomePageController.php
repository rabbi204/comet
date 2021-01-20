<?php

namespace App\Http\Controllers;

use App\Models\HomePage;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    /**
     * slider index
     */
    public function index(){
        $sliders = HomePage::find(1);
        return view('admin.pages.home.sliders.index', [
            'slider' =>$sliders
        ]);
    }

    /**
     * slider store
     */
    public function sliderStore(Request $request){

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

    /**
     *  Clients page show in backend
     */
    public function clientsIndex(){
        $clients_data = HomePage::find(1);
        return view('admin.pages.home.clients.index', compact('clients_data'));
    }
    /**
     * clients update
     */
    public function clientsUpdate(Request $request)
    {
        $clients_data = HomePage::find(1);
        //for client1 image load;
        if ($request -> hasFile('cl1')){
            $cl1_img = $request -> file('cl1');
            $cl1 = md5(time().rand()).'.'.$cl1_img ->getClientOriginalExtension();
            $cl1_img -> move(public_path('media/clients'), $cl1 );

            $cl1_path = 'media/clients/' . $request -> old_cl1;
            if (file_exists($cl1_path)){
                unlink($cl1_path);
            }
        }else{
            $cl1 = $request -> old_cl1;
        }
        //for client2 image load;
        if ($request -> hasFile('cl2')){
            $cl2_img = $request -> file('cl2');
            $cl2 = md5(time().rand()).'.'.$cl2_img ->getClientOriginalExtension();
            $cl2_img -> move(public_path('media/clients'), $cl2 );

            $cl2_path = 'media/clients/' . $request -> old_cl2;
            if (file_exists($cl2_path)){
                unlink($cl2_path);
            }
        }else{
            $cl2 = $request -> old_cl2;
        }
        //for client2 image load;
        if ($request -> hasFile('cl3')){
            $cl3_img = $request -> file('cl3');
            $cl3 = md5(time().rand()).'.'.$cl3_img ->getClientOriginalExtension();
            $cl3_img -> move(public_path('media/clients'), $cl3 );

            $cl3_path = 'media/clients/' . $request -> old_cl3;
            if (file_exists($cl3_path)){
                unlink($cl3_path);
            }
        }else{
            $cl3 = $request -> old_cl3;
        }
        //for client4 image load;
        if ($request -> hasFile('cl4')){
            $cl4_img = $request -> file('cl4');
            $cl4 = md5(time().rand()).'.'. $cl4_img -> getClientOriginalExtension();
            $cl4_img -> move(public_path('media/clients'), $cl4 );

            $cl4_path = 'media/clients/' . $request -> old_cl4;
            if (file_exists($cl4_path)){
                unlink($cl4_path);
            }
        }else{
            $cl4 = $request -> old_cl4;
        }
        //for client5 image load;
        if ($request -> hasFile('cl5')){
            $cl5_img = $request -> file('cl5');
            $cl5 = md5(time().rand()).'.'.$cl5_img ->getClientOriginalExtension();
            $cl5_img -> move(public_path('media/clients'), $cl5 );

            $cl5_path = 'media/clients/' . $request -> old_cl5;
            if (file_exists($cl5_path)){
                unlink($cl5_path);
            }
        }else{
            $cl5 = $request -> old_cl5;
        }
        //for client6 image load;
        if ($request -> hasFile('cl6')){
            $cl6_img = $request -> file('cl6');
            $cl6 = md5(time().rand()).'.'.$cl6_img ->getClientOriginalExtension();
            $cl6_img -> move(public_path('media/clients'), $cl6 );

            $cl6_path = 'media/clients/' . $request -> old_cl6;
            if (file_exists($cl1_path)){
                unlink($cl1_path);
            }
        }else{
            $cl6 = $request -> old_cl6;
        }

        $clients =[
            'title'     =>$request -> title,
            'tagline'     =>$request -> tagline,
            'cl1' => $cl1,
            'cl2' => $cl2,
            'cl3' => $cl3,
            'cl4' => $cl4,
            'cl5' => $cl5,
            'cl6' => $cl6,
        ];

        $clients_json = json_encode($clients);
        $clients_data -> clients = $clients_json;
        $clients_data -> update();
        return redirect() -> back() -> with('success','update successful');


    }


}
