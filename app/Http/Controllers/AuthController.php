<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
    * @OA\Get(
    * path="/user",
    * summary="Dapatkan daftar semua user",
    * description="Mengembalikan daftar semua user",
    * operationId="getUser",
    * tags={"User"},
    * @OA\Response(
    * response=200,
    * description="Daftar user",
    * @OA\JsonContent(
    * type="array",
    * @OA\Items(ref="#/components/schemas/User")
    * )
    * )
    * )
    */

    public function index()
    {
        $user = User::all();
        return response()->json($user);
    }


    /**
    * @OA\Post(
    * path="/register",
    * summary="Daftar user baru",
    * description="Daftar user baru",
    * operationId="postUser",
    * tags={"User"},
    *@OA\RequestBody(
    *required=true,
    *@OA\JsonContent(ref="#/components/schemas/User")
    *),
    * @OA\Response(
    * response=201,
    * description="Daftar user baru",
    * @OA\JsonContent(
    * type="array",
    * @OA\Items(ref="#/components/schemas/Mahasiswa")
    * )
    * )
    * )
    */
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);
    
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
    
        return response()->json($user, 201);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json(['access_token' => $token, 'token_type' => 'Bearer']);
    }

    public function logout(Request $request){
        $user = auth()->user();

        if ($user) {
            $user->currentAccessToken()->delete();

            return response()->json(['message' => 'Successfully logged out'], 200);
        }

        return response()->json(['message' => 'No user is logged in'], 401);
    }


    // public function index(){
    //     return response()->json('Selamat Datang ' . auth()->user()->name . ' pada halaman index',200);
    // }


    /**
 * @OA\Put(
 *     path="/user/{id}",
 *     summary="Edit user",
 *     description="Edit user by ID",
 *     operationId="putUser",
 *     tags={"User"},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         description="ID of the user to be updated",
 *         @OA\Schema(type="integer", example=1)
 *     ),
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(ref="#/components/schemas/User")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Edit user",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="message", type="string", example="User berhasil diupdate")
 *         )
 *     ),
 *     @OA\Response(
 *         response=400,
 *         description="Validation errors",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="message", type="string", example="Validation error"),
 *             @OA\Property(property="errors", type="object")
 *         )
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="User not found",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="message", type="string", example="User not found")
 *         )
 *     )
 * )
 */


    public function update(Request $request,$id){
        $user = User::find($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'sometimes|required|string|min:8',
        ]);
    
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }
    
        if ($request->has('name')) {
            $user->name = $request->name;
        }
        
        if ($request->has('email')) {
            $user->email = $request->email;
        }
    
        if ($request->has('password')) {
            $user->password = Hash::make($request->password);
        }
    
        $user->save();
    
        return response()->json(['message' => 'User berhasil diupdate'], 200);
    }

    /**
     * @OA\Get(
     *     path="/user/{id}",
     *     summary="Get user by ID",
     *     description="Retrieve a single user by their ID",
     *     operationId="getUserById",
     *     tags={"User"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID of the user to retrieve",
     *         @OA\Schema(type="integer", example=1)
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="User data retrieved successfully",
     *         @OA\JsonContent(ref="#/components/schemas/User")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="User not found",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", example="User not found")
     *         )
     *     )
     * )
    */
    public function show($id){
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        return response()->json($user, 200);
    }

    /**
     * @OA\Delete(
     *     path="/user/{id}",
     *     summary="Delete user by ID",
     *     description="Delete a user by their ID",
     *     operationId="deleteUser",
     *     tags={"User"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID of the user to delete",
     *         @OA\Schema(type="integer", example=1)
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="User successfully deleted",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", example="User berhasil dihapus")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="User not found",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", example="User not found")
     *         )
     *     )
     * )
    */
    public function destroy($id){
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $user->delete();

        return response()->json(['message' => 'User berhasil dihapus'], 200);
    }

}
