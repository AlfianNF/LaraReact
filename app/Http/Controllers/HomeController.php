<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('content.home');
    }
    public function about(){
        return view('content.about');
    }
    public function contact(){
        return view('content.contact');
    }

    /**
     * @OA\Get(
     *     path="/api/example",
     *     operationId="getExample",
     *     tags={"Example"},
     *     summary="Get an example resource",
     *     description="Returns an example resource.",
     *     @OA\Response(
     *         response=200,
     *         description="Successful response",
     *         @OA\JsonContent(type="object")
     *     )
     * )
     */
    public function example(){
        return response()->json(['message' => 'This is an example']);
    }

    /**
     * @OA\Info(
     *     title="My API",
     *     version="1.0.0"
     * )
     *
     * @OA\PathItem(path="/")
     */

}
