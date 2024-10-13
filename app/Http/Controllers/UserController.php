<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

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


}