<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class SettingTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['title', 'content','address'.'setting_id','local'];
}
