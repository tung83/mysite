<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Requests\Admin\Auth\LoginRequest;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin@@';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }
    
    public function login(LoginRequest $request)
    {
        if ($lockedOut = $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return redirect('admin@@/login')
                ->with('error', trans('front/login.maxattempt'))
                ->withInput($request->only('log'));
        }

        $logValue = $request->input('log');

        $logAccess = filter_var($logValue, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        $credentials = [
            $logAccess  => $logValue,
            'password'  => $request->input('password'),
        ];

        if (!auth()->validate($credentials)) {
            if (! $lockedOut) {
                $this->incrementLoginAttempts($request);
            }

            return redirect('admin@@/login')
                ->with('error', trans('front/login.credentials'))
                ->withInput($request->only('log'));
        }

        $user = auth()->getLastAttempted();

        if ($user->confirmed) {
            if (! $lockedOut) {
                $this->incrementLoginAttempts($request);
            }

            auth()->login($user, $request->input('memory', false));

            if ($request->session()->has('user_id')) {
                $request->session()->forget('user_id');
            }

            return redirect('/admin@@');
        }
        
        $request->session()->put('user_id', $user->id);

        return redirect('admin@@/login')->with('error', trans('front/verify.again'));
    }
}
