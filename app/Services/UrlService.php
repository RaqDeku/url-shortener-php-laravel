<?php

namespace App\Services;

use App\Helpers\Helpers;
use App\Models\Url;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class UrlService
{
    public function shortenUrl(Request $request, string $originalUrl)
    {
        $randomString = Helpers::generateString();

        $host = $request->getHost();
        $port = $request->getPort();

        $newUrl = new Url();

        $newUrl->originalUrl = $originalUrl;
        $newUrl->shortUrl = $randomString;

        $newUrl->save();

        return ["shortUrl" => "$host:$port/$randomString"];
    }

    public function getOriginalUrlAndRedirect(string $shortUrl)
    {

        $urlObject = Url::where('shortUrl', $shortUrl)->get();

        if (count($urlObject) === 0) {
            throw new ModelNotFoundException('URL not found ' . $shortUrl);
            // abort(404);
        }

        return $urlObject[0]["originalUrl"];
    }
}
