<?php

namespace App\Http\Controllers;

use App\Http\Requests\UrlRequest;
use App\Jobs\PorccessUrl;
use App\Url;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UrlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $pag = 2;
        return view('shortenLink', [
            'shortLinks' => $request->user()->urls()->paginate($pag)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(UrlRequest $request, Url $url) {
        if ($url->createUrl($request->user(), $request->only($url->getFillable()))) {
            return redirect()->route('urls.index')->with('success', 'Ссылка успешно сокращена');
        }
        else {
            return redirect()->route('urls.index')->withErrors('Такая ссылка уже есть');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Url $url)
    {
        PorccessUrl::dispatch($url);
        //PorccessUrl::dispatchNow($url); выолнить прям сейчас

        return redirect($url->url);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Url $url)
    {
        $this->authorize('delete',$url);
        $url->delete();
        return redirect()->route('urls.index');
    }
}
