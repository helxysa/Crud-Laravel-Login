<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UserRequest;

class UsersController extends Controller
{
    
    /*
    
        @return
    
    */

    public function index(): JsonResponse
    {
        $users = User::orderBy("id", "DESC")->paginate(2);
        return response() -> json([
            'status' => true,
            'message' => $users, 
        ], 200);

    }

    public function show(User $user)
    {
        return response() -> json([
            'status' => true,
            'message' => $user, 
        ], 200);
    }

    public function store(UserRequest $request)
    {
        DB::beginTransaction();

        try {

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request -> password,
            ]);

            DB::commit();
            
            return response() -> json([
                'status' => true,
                'user' => $user,
                'message' => "Usuário cadastrado com sucesso", 
            ], 201);

        } catch (Exception $e) {
            DB::rollBack();

            return response() -> json([
                'status' => false,
                'message' => "Usuário não cadastrado", 
            ], 200);
        }
    }

    public function update(UserRequest $request, User $user) : JsonResponse
    {
        DB::beginTransaction();

        try {
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password, ]);

            DB::commit();

            
        return response() -> json([
            'status' => false,
            'user' => $user,
            'message' => "Usuário editado com sucesso", 
        ], 200);    
            
        } catch (Exception $e){

        DB::rollBack();


        return response() -> json([
            'status' => false,
            'user' => $user,
            'message' => "Ação não foi realizada", 
        ], 200);

        }




       

    }

    public function delete(User $user) : JsonResponse
    {
        DB::beginTransaction();
        try {
                    
        $user -> delete();

        DB::commit();
        
        return response() -> json([
            'status' => true,
            'message' => 'Usuário excluido com sucesso',
        ], 200);
        

        } catch (Exeception $e) {
            DB::rollBack();
            
            return response() -> json([
                'status' => false,
                'message' => 'Usuario não foi excluido'
            ]);

        }

    }
}
