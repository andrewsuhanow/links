<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;

use App\Models\Links;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class MainController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function Main(){

        $aBDLinks = Links::get();
//        dd($aBDLinks);

        return view('common.main_page', [
            'aBDLinks' => $aBDLinks
        ]);
    }


    public function MainPost(Request $request){


        $aBDLinks = new Links();


        $aBDLinks->name = $request->newname;
        $aBDLinks->Link = $request->newLink;
        $aBDLinks->description = $request->newdescription;

        $aBDLinks->save();

        return response()->json([
            'status' => 'success',
 /*           'products' => view('common.main_page', [
                'newLink' => $request->newLink,
                'newname' => $request->newname,
                'newdescription' => $request->newdescription,
            ])*/
        ]);
    }



}
