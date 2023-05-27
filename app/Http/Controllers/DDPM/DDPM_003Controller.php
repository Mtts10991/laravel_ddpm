<?php

namespace App\Http\Controllers\DDPM;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\DDPM_003;
use App\Helpers\ErrorNotification;
use App\Helpers\UserResponse;

class DDPM_003Controller extends Controller
{
    //
    public function pushData()
    {
        try {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL,"http://portal.disaster.go.th/portal/wsjson?queryCode=DPM003&user=xws-0076&password=-656f2896&PROVINCE_ID=54");
            curl_setopt($ch, CURLOPT_POST, 1);
            // Receive server response ...
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $server_output = curl_exec($ch);
            curl_close($ch);
            if($server_output){
                $data = json_decode($server_output, true);
                $ss = [];
                foreach($data['rows'] as $value){
                    DDPM_003::create([
                        'DPM_CENTER_ID' => $value['DPM_CENTER_ID'],
                        'CODE' => $value['CODE'],
                        'NAME' => $value['NAME'],
                        'TYPE' => $value['TYPE'],
                        'ADDRESS' => $value['ADDRESS'],
                        'PROVINCE_ID' => $value['PROVINCE_ID'],
                        'PROVINCE_NAME' => $value['PROVINCE_NAME'],
                        'AMPHUR_ID' => $value['AMPHUR_ID'],
                        'AMPHUR_NAME' => $value['AMPHUR_NAME'],
                        'DISTRICT_ID' => $value['DISTRICT_ID'],
                        'DISTRICT_NAME' => $value['DISTRICT_NAME'],
                        'TEL' => $value['TEL'],
                        'FAX' => $value['FAX'],
                        'EMAIL' => $value['EMAIL'],
                        'WEBSITE' => $value['WEBSITE'],
                        'LATITUDE' => $value['LATITUDE'],
                        'LONGITUDE' => $value['LONGITUDE'],
                        'VOLUNTEER_AMT' => $value['VOLUNTEER_AMT'],
                    ]);
                    // $ss[] = $value['NAME'];
                }
                // return response()->json($ss);
                // return response()->json($data['rows']);
                return response()->json(array('data' => DDPM_003::get()));
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function where_data(Request $request)
    {
        try {
            $keyword = array();
            $request->has('DPM_CENTER_ID')? $keyword['DPM_CENTER_ID'] = $request->DPM_CENTER_ID : '';
            $request->has('CODE')? $keyword['CODE'] = $request->CODE : '';
            $request->has('NAME')? $keyword['NAME'] = $request->NAME : '';
            $request->has('TYPE')? $keyword['TYPE'] = $request->TYPE : '';
            $request->has('ADDRESS')? $keyword['ADDRESS'] = $request->ADDRESS : '';
            $request->has('PROVINCE_ID')? $keyword['PROVINCE_ID'] = $request->PROVINCE_ID : '';
            $request->has('PROVINCE_NAME')? $keyword['PROVINCE_NAME'] = $request->PROVINCE_NAME : '';
            $request->has('AMPHUR_ID')? $keyword['AMPHUR_ID'] = $request->AMPHUR_ID : '';
            $request->has('AMPHUR_NAME')? $keyword['AMPHUR_NAME'] = $request->AMPHUR_NAME : '';
            $request->has('DISTRICT_ID')? $keyword['DISTRICT_ID'] = $request->DISTRICT_ID : '';
            $request->has('DISTRICT_NAME')? $keyword['DISTRICT_NAME'] = $request->DISTRICT_NAME : '';

            if(count($keyword) < 1){
                $data = DDPM_003::orderBy('id', 'DESC')->get();
            }else{
                $data = DDPM_003::where($keyword)->orderBy('id', 'DESC')->get();
            }
            return UserResponse::sent(Response::HTTP_OK, UserResponse::STATUS_SUCCESS, UserResponse::MSG_SUCCESS, $data);
        } catch (\Throwable $th) {
            return UserResponse::sent(Response::HTTP_INTERNAL_SERVER_ERROR, UserResponse::STATUS_ERROR, ['ระบบขัดข้อง', $th]);
        }
    }
}
