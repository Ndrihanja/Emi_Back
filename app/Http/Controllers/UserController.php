<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Passport\TokenRepository;

class UserController extends BaseController
{
    public function login(Request $request)
    {
        $incoming = $request->only(['email', 'password']);

        if (auth()->attempt($incoming)) {
            $user = auth()->user();
            $token = $user->createToken('user_token')->accessToken;
            $user_data = [
                'email' => $user->email,
                'token' => $token
            ];

            return $this->sendResponse($user_data, 'User logged successfully with access token');
        }

        return $this->sendError('User authentication failed');
    }

    public function logout()
    {
        $access_token = auth()->user()->token();

        // logout from only current device
        $tokenRepository = app(TokenRepository::class);
        $tokenRepository->revokeAccessToken($access_token->id);

        return $this->sendResponse([], 'User logout successfully !');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return $this->sendResponse($users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $incoming = $request->only(["name", "email", "password", "role"]);

        $validator = Validator::make($incoming, [
            'name' => 'required',
            'password' => 'required',
            'email' => [ 'required ', 'email', Rule::unique('users') ],

        ]);
        if ($validator->fails()) {
            return $this->sendError('Remplir les champs requis et éviter d\'utiliser un email déjà pris.', $validator->errors());
        }

        $incoming['password'] = bcrypt($incoming['password']);

        User::create($incoming);
        $users = User::all();

        return $this->sendResponse($users, "Ajout réussi");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $incoming = $request->only(["name", "email", "role"]);

        $validator = Validator::make($incoming, [
            'name' => 'required',
            'email' => [ 'required ', 'email', Rule::unique('users')->ignore($id) ],
        ]);
        if ($validator->fails()) {
            return $this->sendError('Remplir les champs requis et éviter d\'utiliser un email déjà pris.', $validator->errors());
        }

        if (User::find($id)->update($incoming)) {
            $users = User::all();
            return $this->sendResponse($users, "Modification réussi");
        }

        return $this->sendError([], "Opération non réussi");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        $users = User::all();
        return $this->sendResponse($users, "Utilisateur supprimé");
    }
}
