<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AlbumController;

class ShareData
{
    public function handle(Request $request, Closure $next)
    {
        $userController = new UserController();
        $artists = $userController->index();

        $albumController = new AlbumController();
        $albums = $albumController->index();

        view()->share('artists', $artists);
        view()->share('albums', $albums);

        return $next($request);
    }
}