<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Services\UrlService;

class UrlsController extends Controller
{
    private $urlService;

    public function __construct(UrlService $urlService)
    {
        $this->urlService = $urlService;
    }

    public function shorten(Request $request)
    {
        $originalUrl = $request->input('longUrl');

        $shortUrl = $this->urlService->shortenUrl($request, $originalUrl);

        return view('home', $shortUrl);
    }

    public function redirect(string $shortUrl)
    {
        try {
            $urlToRedirectTo = $this->urlService->getOriginalUrlAndRedirect($shortUrl);
        } catch (ModelNotFoundException $exception) {
            abort(404);
            // return back()->withErrors($exception->getMessage())->withInput();
        }

        return redirect($urlToRedirectTo);
    }
}
