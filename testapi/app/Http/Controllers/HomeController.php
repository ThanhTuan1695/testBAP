<?php

namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      //  $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::all();
    }

     public function authenticate(Request $req)
    {   

        $cre = $req->only('email','password');

        try{
            if (! $token = JWTAuth::attempt($cre)) {
               return $this->response->error(['error' => 'user cre are not correct '], 401);
            }

        } catch (JWTException $e) {
            return $this->response->error(['error' => 'something wrong '], 500);
        }


        return $this->response->array(compact('token'))->setStatusCode(200);
    }

    public function show()
    {
        try{
            $user = JWTAuth::parseToken()->toUser();

            if (! $user) {
                return $this->response->errorNotFound('user not found');

            }
        } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e){
            return $this->response->error('Token is valid');
        } catch (\Tymon\JWTAuth\Exceptions\TokenExpriredException $e){
            return $this->response->error('Token is Exprired');
        } catch (\Tymon\JWTAuth\Exceptions\TokenBlacklistedException $e){
            return $this->response->error('Token is black ');
        }
        
        return $this->response->array(compact('user'));
    }

    public function getTokens()
    {   

        $token = JWTAuth::getToken();
        if (! $token) {
            return $this->response->errorUnauthorized('Token is invalid');
        }

        try{
            $refreshToken = JWTAuth::refresh($token);
        } catch(JWTException $e){
            $this->response->error('Something went wrong');
        }

        return $this->response->array(compact('refreshToken'));
    }

    public function destroy()
    {
        $user = JWTAuth::parseToken()->authenticate();
        if (! $use) {
            
        }

        $user->delete();
    }
}
