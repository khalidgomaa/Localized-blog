<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Setting extends Model implements TranslatableContract
{
    use Translatable;

    public $translatedAttributes = ['title', 'content','address'];
    protected $fillable = ['logo','favicon','facebook','instegram','email','phone'];
}