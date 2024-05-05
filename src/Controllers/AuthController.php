<?php

namespace JoulesLabs\IllumineAdmin\Controllers;


use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AuthController extends Controller
{
    
    public function loginPage(): View
    {
        return view('admin.auth.login');
    }

    public function login(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'email' => 'email',
            'password' => 'required',
        ]);

        $userModel = config('illumineadmin.users.model')::where('email', $request->input('email'))
                            ->where('status', UserStatus::ACTIVE)
                            // ->where('type', UserType::INTERNAL())
                            ->first();

        if (!$userModel) {
            return redirect()
                ->back()
                ->withInput($request->all())
                ->with([
                    '_status' => 'error',
                    '_msg' => 'Unauthorized access, no account found for this email!'
                ]);
        }

        if (!Hash::check((string) $request->input('password'), $userModel->password)) {
            return redirect()
                ->back()
                ->with([
                    '_status' => 'error',
                    '_msg' => 'Unauthorized access, wrong password, please try again!'
                ]);
        }

        Auth::guard(config('illumineadmin.auth.guard'))->login($userModel);
        $request->session()->regenerate();

        return redirect()->route('admin::home');
    }

    public function logout(): RedirectResponse
    {
        Auth::guard(config('illumineadmin.auth.guard'))->logout();
        \request()->session()->flush();
        \request()->session()->regenerate(true);

        return redirect()->route('admin::auth.login.page');
    }

}