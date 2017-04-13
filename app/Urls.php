<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Urls extends Model
{
    //
    protected $fillable = ['mobile_url','desktop_url','short_url','mobile_clicks', 'desktop_clicks' ];

    public function getShortUrl()
        {
            $lastId = $this->getNewId();
            return url(strtr(rtrim(base64_encode(pack('i', $lastId)), '='), '+/', '-_'));
        }



    public static function findByCode($code)
        {
            $id = unpack('i', base64_decode(str_pad(strtr($code, '-_', '+/'), strlen($code) % 4, '=')));
            return ShortUrl::findOrFail($id);
        }

    public function getNewId()
    {
      $max = $this->whereRaw('id = (select max(`id`) from urls)')->get();
      return $max->first()->id+1;
    }



}
