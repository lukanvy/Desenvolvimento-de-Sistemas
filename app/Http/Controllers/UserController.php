<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    
    public function index(Request $request): JsonResponse
    {
        $user = $request->user();

        if (!$user) {
            return response()->json(['message' => 'Usuário não autenticado'], 401);
        }

        $query = User::with('roles');

        if ($user->isAdmin()) {
            $users = $query->get();
        } else {
            $users = $query->whereHas('roles', function ($q) use ($user) {
                $q->whereIn('name', $user->roles()->pluck('name'));
            })->get();
        }

        return response()->json($users);

    }

    
    public function create(): Response
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): Response
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user): Response
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user): JsonResponse
    {
        //
        $user->delete();
        return response()->json(['message' => 'User deleted successfully']);
    }
}


?>