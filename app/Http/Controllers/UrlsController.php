<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Url;
use App\Helpers\Helpers;

class UrlsController extends Controller
{
    public function shorten()
    {
        $originalUrl = request("longUrl");

        $helperClass = new Helpers();

        $shortUrl = $helperClass::generateString();

        $host = request()->getHost();
        $port = request()->getPort();

        $urlToSave = new Url();

        $urlToSave->originalUrl = $originalUrl;
        $urlToSave->shortUrl = $shortUrl;

        $urlToSave->save();

        return view("home", ['shortUrl' => "$host:$port/$shortUrl"]);
    }

    public function redirect(string $shortUrl)
    {
        $urlToRedirectTo = new Url();
        $url = $urlToRedirectTo::where('shortUrl', $shortUrl)->get();

        return redirect($url[0]["originalUrl"]);
    }
}
