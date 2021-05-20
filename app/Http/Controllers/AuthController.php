<?php
namespace App\Http\Controllers;
use App\Http\Requests\AuthloginRequest;
use App\Http\Requests\AuthRegisterRequest;
use App\Http\Requests\AuthUpdateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use App\Models\Uyelik;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use mysql_xdevapi\Collection;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);

    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(AuthloginRequest $request)
    {

        if (!$token = auth()->attempt($request->validated())) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }
    public function register(AuthRegisterRequest $request)
    {
        $user = User::create($request->validated());

        return $this->respondWithToken(auth()->attempt(request(['email', 'password'])));
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    public function update(UserUpdateRequest $request)
    {

        return auth()->user()->update($request->validated());
    }

    public function passwordUpdate(AuthUpdateRequest $request)
    {
        auth()->user()->update($request->validated());

        return $this->respondWithToken(auth()->attempt([
            "email" => auth()->user()->email,
            "password" => $request->get("password")
        ]));

    }


    public function subscriptions()
    {

       return auth()->user()->topics();
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
