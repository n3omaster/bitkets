<?php

namespace App\Http\Controllers\Api;

use BaconQrCode\Writer;
use Illuminate\Http\Request;

use BaconQrCode\Renderer\Color\Rgb;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\RendererStyle\Fill;
use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Renderer\Image\ImagickImageBackEnd;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;

class QrController extends Controller
{
    public function qr($code)
    {
        $img = (new Writer(new ImageRenderer(new RendererStyle(100, 1, null, null, Fill::uniformColor(new Rgb(255, 255, 255), new Rgb(45, 55, 72))), new ImagickImageBackEnd)))
            ->writeString($code);
        return base64_encode($img);

        /*
        $svg = (new Writer(new ImageRenderer(new RendererStyle(100, 1, null, null, Fill::uniformColor(new Rgb(255, 255, 255), new Rgb(45, 55, 72))), new ImagickImageBackEnd)))
        //->writeString(base64_decode($code));
        ->writeString($code);

        return trim(substr($svg, strpos($svg, "\n") + 1));
        */
    }
}
