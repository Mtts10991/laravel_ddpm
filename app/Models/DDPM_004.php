<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DDPM_004 extends Model
{
    use HasFactory;
    protected $fillable = [
        "SHELTERID",
        "SHELTERNAME",
        "PROVINCECODE",
        "TAMBONCODE",
        "POSTALCODE",
        "LATITUDE",
        "LONGITUDE",
        "OFFICER",
        "TEL",
        "SHELTERTYPE",
        "AREA",
        "TOILETAMOUNT",
        "DISTANCEFROMTOILET",
        "HAVEWATER",
        "WATERTYPE",
        "WATERPERDAYFORCONSUMTION",
        "WATERPERDAYFORSHELTER",
        "PERSONAMOUNT",
    ];
}
