<?php

namespace App\Http\Controllers;

use App\Http\Requests\UrlRequest;
use Illuminate\Http\Request;
use App\Url;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Foundation\Validation\ValidatesRequests;

class ShortLinkController extends Controller
{
    public function index() {
        $user = Auth::user();
        if ($user == null) {
            return redirect()->route('login');
        } else {
            return view('shortenLink', [
                'shortLinks' => DB::table('urls')->where('user_id', Auth::user()->id)->get()
            ]);
        }
    }

    public function store(UrlRequest $request) {

        $url = new Url;

        if ($url->create($request->input('name'), $request->input('url'))) {
            return redirect()->route('generate.shorten.link')->with('success', 'Ссылка успешно сокращена');
        }
        else {
            return redirect()->route('generate.shorten.link')->with('mistake','Ссылка уже есть');
        }
    }

    public function shortenLink($short_code) {

        $link = Url::where('short_code', $short_code)->first();
        $link->counter++;
        $link->save();
        return redirect($link->url);
    }

    public function delete($id) {
        $link = Url::find($id)->delete();
        return redirect()->route('generate.shorten.link')->with('success_delete', 'Ссылка была удалена');
    }
}
