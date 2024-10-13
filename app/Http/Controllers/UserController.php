<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function profile(User $user)
    {
        return view('client.profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $userId = session('user.id_user');

        // Tìm kiếm người dùng bằng id_user
        $user = User::where('id_user', $userId)->firstOrFail();
        // dd($userId);
        // dd($user);

        // Xử lý validate
        $data = $request->validate([
            'full_name' => 'max:255',
            'user_name' => 'max:255|unique:users,user_name,' . $user->id_user . ',id_user',
            'email' => 'email|max:255|unique:users,email,' . $user->id_user . ',id_user',
            'phone' => 'unique:users,phone,' . $user->id_user . ',id_user',
            'avata' => 'nullable|image|max:2048',
        ]);

        try {
            // Kiểm tra và xử lý file avatar
            if ($request->hasFile('avata')) {
                $data['avata'] = Storage::put('userAvata', $request->file('avata'));
            }

            // Cập nhật thông tin người dùng
            $user->update($data);
            // dd($data);

            return redirect()->back()->with('message', 'Thao tác thành công✅');

        } catch (\Throwable $th) {

            // Xóa file đã upload nếu cập nhật thất bại
            if (!empty($data['avata']) && Storage::exists($data['avata'])) {
                Storage::delete($data['avata']);
            }
            // \Log::error($th);
            return redirect()->back()->with('error', 'Thao tác thất bại❗');
        }
    }

    public function formChangePass(User $user)
    {
        return view('auth.passwords.changePassword');
    }

    public function updatePassword(Request $request)
    {
        // dd($request->all());
        $userId = session('user.id_user');

        // Tìm kiếm người dùng bằng id_user
        $user = User::where('id_user', $userId)->firstOrFail();
        // dd($userId);

        // Validate the input
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|confirmed',
        ], [
            'new_password.confirmed' => 'Mật khẩu mới và nhập lại mật khẩu không khớp!',
        ]);


        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()
                ->withErrors(['current_password' => 'Mật khẩu hiện tại không đúng❗'])
                ->withInput();
        }

        $user->update([
            'password' => Hash::make($request->new_password),
        ]);

        return redirect()->route('profile', $user->id_user)->with('message', 'Đổi mật khẩu thành công✅');
    }

    public function forgotPassword()
    {
        return view('auth.passwords.forgotPassword');
    }

    public function postForgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|exists:users,email'
        ], [
            'email.required' => 'Vui lòng nhập vào email❗',
            'email.exists' => 'Email không tồn tại hoặc chưa đăng ký❗',
        ]);

        $token = strtoupper(Str::random(10));
        $user = User::where('email', $request->email)->first();


        // Cập nhật token vào user
        $user->update(['token' => $token]);
        //  dd($user->token);

        // Gửi email khôi phục mật khẩu
        Mail::send('auth.emails.emailForgot', compact('user'), function ($email) use ($user) {
            $email->subject('Admin - Lấy lại mật khẩu');
            $email->to($user->email, $user->full_name);
        });

        return redirect()->route('login')->with('message', 'Email đã được gửi, vui lòng check mail để đổi mật khẩu❗');
    }

    public function getPassword(User $user, $token)
    {
        if ($user->token === $token) {
            return view('auth.emails.getPassword');
        }
        return abort(404);
    }

    public function postPassword(User $user, $token, Request $request)
    {
        $request->validate([
            'password' => 'required',
            'password_confirmation' => 'required|same:password'
        ]);

        $passNew = bcrypt($request->password);
        $user->update(['password' => $passNew, 'token' => null]);
        return redirect()
            ->route('showLoginForm')
            ->with('message', 'Mật khẩu đã được cập nhật✅, vui lòng đăng nhập.');
    }


}