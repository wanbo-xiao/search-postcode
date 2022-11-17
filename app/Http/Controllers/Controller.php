<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function searchByPostcode (Request $request){
        $postcode = $request->post('postcode');
        $returnData = $this->searchFromJson($postcode);
        return response()->json(['data'=>$returnData]);
    }

    public function searchFromJson($postcode){
        $locations = json_decode(file_get_contents(storage_path() . "/app/public/location.json"), true);
        $returnData = [];
        foreach ($locations as $val){
            if ($val['postcode'] == $postcode) {
                $returnData[] = $val;
            }
        }
        return $returnData;
    }
}
