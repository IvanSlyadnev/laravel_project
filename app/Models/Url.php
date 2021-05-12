<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Url extends Model
{
    public $timestamps = false;

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function getRouteKeyName()
    {
        return 'short_code';
    }

    protected $fillable = [
        'short_code', 'url', 'counter', 'name'
    ];

    protected function check($user, $url) {
        return $user->urls()->where('url', $url)->count();
    }

    public function createUrl ($user, $data) {
        if (!$this->check($user, $data['url'])) {
            $data['short_code'] = str_random(6);
            return $user->urls()->create($data);
        } else return null;
    }

}
