<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\UserCollection;
use App\Http\Resources\V1\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new UserCollection(User::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateRequest = $this->validateRequest($request);

        if ($validateRequest->fails()) {
            return response()->json([
                'message' => 'Los datos no son válidos',
                'errors' => $validateRequest->errors(),
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $user = User::create($request->all());

        return response()->json([
            'message' => 'Usuario registrado correctamente',
            'data' => new UserResource($user),
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $user = User::find($id);

        if ($user) {
            return new UserResource($user);
        }

        return response()->json([
            'message' => 'Usuario no encontrado',
        ], Response::HTTP_NOT_FOUND);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $validateRequest = $this->validateRequest($request);

        if ($validateRequest->fails()) {
            return response()->json([
                'message' => 'Los datos no son válidos',
                'errors' => $validateRequest->errors(),
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $user = User::find($id);

        if ($user) {
            $user->update($request->all());

            return response()->json([
                'message' => 'Usuario actualizado correctamente',
                'data' => new UserResource($user),
            ], Response::HTTP_OK);
        }

        return response()->json([
            'message' => 'Usuario no encontrado',
        ], Response::HTTP_NOT_FOUND);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
            return response()->json([
                'message' => 'Usuario eliminado correctamente',
            ], Response::HTTP_NO_CONTENT);
        }

        return response()->json([
            'message' => 'Usuario no encontrado',
        ], Response::HTTP_NOT_FOUND);
    }

    /**
     * Validate the request data
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Illuminate\Support\Facades\Validator
     */
    public function validateRequest(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'edad' => 'required|integer|min:18|max:100',
        ], [
            'edad.min' => 'La edad mínima es 18',
            'edad.max' => 'La edad máxima es 100',
        ]);

        return $validator;
    }
}
