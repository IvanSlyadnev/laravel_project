<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Url extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'short_code', 'url', 'counter', 'name'
    ];

    protected function check($url) {
        $links = DB::table('urls')->where('user_id', Auth::user()->id)->get();
        foreach ($links as $link) {
            if ($url == $link->url) return false;
        }
        return true;
    }

    public function create ($name, $url) {
        if ($this->check($url)) {
            $this->name = $name;
            $this->url = $url;
            $this->short_code = str_random(6);
            $this->user_id = Auth::user()->id;
            $this->save();
            return true;
        } else return false;
    }
}
