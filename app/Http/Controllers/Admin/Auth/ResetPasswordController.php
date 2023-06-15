<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ResetPasswordController extends Controller
{
    public function __construct()
    {
        view()->share([
            'reset_password_active' => 'active',

        ]);
    }
    /**


    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */

    public function showResetForm()
    {
        return view('admin.auth.passwords.reset');
    }

    public function postResetPassword(ChangePasswordRequest $request)
    {
        try {
            $password = bcrypt($request->password);
            $userId = Auth::id();
            $user = User::find($userId);

            $user->password = $password;
            $user->save();
            Auth::logout();
            return redirect()->route('admin.login');

        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Đã xảy ra lỗi không thể cập nhật mật khẩu');
        }


    }
}
