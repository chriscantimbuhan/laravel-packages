<?php

namespace App\Http\Controllers;

use Ccantimbuhan\LaravelMedia\Facade\Media as FacadeMedia;
use Ccantimbuhan\LaravelMedia\Models\Media;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function update(Request $request, Media $media)
    {
        FacadeMedia::update($media, $request);
    }
}
