<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class RequestController extends Controller
{
    public function postRequest(Request $request){
        $name = $request->input('name');
        $email = $request->input('email');
        
        
        if (empty($name) || empty($email)) {
            return response()->json([
                'message' => 'Data Tidak Boleh Kosong',
                'status' => 404
            ], 404);
        }

        $data = [
            'name' => $name,
            'email' => $email
        ];


        // return response()->json('Data Berhasil Terkirim',200);
        return response()->json([
            'data' => $data,
            'message'=> 'Data Berhasil Terkirim',
            'status'=> 200
        ],200);
    }

    public function getRequest(Request $request){
        $data=[
            $name=$request->query('name'),
            $email=$request->query('email')
        ];

        return response()->json([
            'data' => $data,
            'message'=> 'Data Berhasil Ditangkap',
            'status'=> 200
        ],200);
    }

    public function addRequest(Request $request){

    }


    /**
 * @OA\Get(
 *     path="/api/example",
 *     summary="Example endpoint",
 *     description="Returns an example response",
 *     operationId="example",
 *     tags={"Example"},
 *     @OA\Response(
 *         response=200,
 *         description="Successful response",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="message", type="string", example="This is an example response")
 *         )
 *     )
 * )
 */

}
