<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DDPM_003;

class DDPM_003 extends Model
{
    use HasFactory;
    // use Searchable;
    protected $fillable = [
        'DPM_CENTER_ID',
        'CODE',
        'NAME',
        'TYPE',
        'ADDRESS',
        'PROVINCE_ID',
        'PROVINCE_NAME',
        'AMPHUR_ID',
        'AMPHUR_NAME',
        'DISTRICT_ID',
        'DISTRICT_NAME',
        'TEL',
        'FAX',
        'EMAIL',
        'WEBSITE',
        'LATITUDE',
        'LONGITUDE',
        'VOLUNTEER_AMT',
    ];


}
