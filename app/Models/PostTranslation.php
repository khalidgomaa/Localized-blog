<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class PostTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['id', 'post_id'];
}
