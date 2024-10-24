<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Setting extends Model implements TranslatableContract
{
    use Translatable;

    public $translatedAttributes = ['title', 'content', 'address'];
    protected $fillable = ['logo', 'favicon', 'facebook', 'instagram', 'email', 'phone'];


    public static function checkSetting()
    {
        $settings = self::all();
        if (count($settings) < 1) {
            $data = [
                'id' => '1',
            ];
            foreach (config('app.languages') as $key => $value) {
                $data[$key]['title'] = $value;
            }
            self::create($data);
        }
        return self::first();
    }
}
