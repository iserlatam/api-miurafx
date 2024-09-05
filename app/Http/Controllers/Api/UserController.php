<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        return (new UserCollection(User::paginate(10)))->response();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = new User();

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();

        return response()->json([
            "message" => "User ID {$user->id} created successfully."
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user): JsonResponse
    {
        return (new UserResource($user))->response();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();

        Log::info("User ID {$user->id} updated successfully.");

        return (new UserResource($user))->response();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        Log::info("User ID {$user->id} deleted successfully.");

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
