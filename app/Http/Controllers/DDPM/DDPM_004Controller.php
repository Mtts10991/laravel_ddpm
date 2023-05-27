<?php

namespace App\Http\Controllers\DDPM;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\DDPM_004;
use App\Helpers\ErrorNotification;
use App\Helpers\UserResponse;

class DDPM_004Controller extends Controller
{
    //
    public function pushData()
    {
        try {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL,"http://portal.disaster.go.th/portal/wsjson?queryCode=DPM004&user=xws-0076&password=-656f2896&PROVINCE_ID=54");
            curl_setopt($ch, CURLOPT_POST, 1);
            // Receive server response ...
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $server_output = curl_exec($ch);
            curl_close($ch);
            if($server_output){
                $data = json_decode($server_output, true);
                $ss = [];
                foreach($data['rows'] as $value){
                    DDPM_004::create([
                        'SHELTERID' => $value['SHELTERID'],
                        'SHELTERNAME' => $value['SHELTERNAME'],
                        'PROVINCECODE' => $value['PROVINCECODE'],
                        'TAMBONCODE' => $value['TAMBONCODE'],
                        'POSTALCODE' => $value['POSTALCODE'],
                        'LATITUDE' => $value['LATITUDE'],
                        'LONGITUDE' => $value['LONGITUDE'],
                        'OFFICER' => $value['OFFICER'],
                        'TEL' => $value['TEL'],
                        'SHELTERTYPE' => $value['SHELTERTYPE'],
                        'AREA' => $value['AREA'],
                        'TOILETAMOUNT' => $value['TOILETAMOUNT'],
                        'DISTANCEFROMTOILET' => $value['DISTANCEFROMTOILET'],
                        'HAVEWATER' => $value['HAVEWATER'],
                        'WATERTYPE' => $value['WATERTYPE'],
                        'WATERPERDAYFORCONSUMTION' => $value['WATERPERDAYFORCONSUMTION'],
                        'WATERPERDAYFORSHELTER' => $value['WATERPERDAYFORSHELTER'],
                        'PERSONAMOUNT' => $value['PERSONAMOUNT'],
                    ]);
                    // $ss[] = $value['NAME'];
                }
                // return response()->json($ss);
                // return response()->json($data['rows']);
                return response()->json(array('data' => DDPM_004::get()));
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function where_data(Request $request)
    {
        try {
            $keyword = array();
            $request->has('SHELTERID')? $keyword['SHELTERID'] = $request->SHELTERID : '';
            $request->has('SHELTERNAME')? $keyword['SHELTERNAME'] = $request->SHELTERNAME : '';
            $request->has('PROVINCECODE')? $keyword['PROVINCECODE'] = $request->PROVINCECODE : '';
            $request->has('TAMBONCODE')? $keyword['TAMBONCODE'] = $request->TAMBONCODE : '';
            $request->has('POSTALCODE')? $keyword['POSTALCODE'] = $request->POSTALCODE : '';
            $request->has('OFFICER')? $keyword['OFFICER'] = $request->OFFICER : '';
            $request->has('SHELTERTYPE')? $keyword['SHELTERTYPE'] = $request->SHELTERTYPE : '';
            $request->has('HAVEWATER')? $keyword['HAVEWATER'] = $request->HAVEWATER : '';

            if(count($keyword) < 1){
                $data = DDPM_004::orderBy('id', 'DESC')->get();
            }else{
                $data = DDPM_004::where($keyword)->orderBy('id', 'DESC')->get();
            }
            return UserResponse::sent(Response::HTTP_OK, UserResponse::STATUS_SUCCESS, UserResponse::MSG_SUCCESS, $data);
        } catch (\Throwable $th) {
            return UserResponse::sent(Response::HTTP_INTERNAL_SERVER_ERROR, UserResponse::STATUS_ERROR, ['ระบบขัดข้อง', $th]);
        }
    }
}
