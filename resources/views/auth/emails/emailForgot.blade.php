<div
    style="max-width: 600px; margin: 20px auto; background-color: #ffffff; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
    <div
        style="background-color: #f5fff5; color: white; padding: 20px; border-radius: 10px 10px 0 0; text-align: center;">
        <h1 style="margin: 0;">Thông báo mới</h1>
    </div>
    <div style="padding: 20px;">
        <h2 style="color: #333;">Xin chào: {{ $user->full_name }}</h2>
        <p style="color: #555;">Đây là email giúp bạn thay đổi lại mật khẩu của mình.</p>
        <p style="color: #555;">Để có thể đăng nhập và sử dụng trang web, vui lòng <strong>Click</strong> vào đường link
            bên dưới để thay đổi lại mật khẩu tài khoản của bạn</p>
        <a href="{{ route('getPassword', ['user' => $user->id_user, 'token' => $user->token]) }}"
            style="display: inline-block; background-color: #dfdfdf; color: #333; padding: 10px 20px; text-decoration: none; border-radius: 5px; font-weight: bold;">
            Thay đổi mật khẩu
        </a>
    </div>
    <div
        style="background-color: #f4f4f4; color: #555555; padding: 10px; text-align: center; border-radius: 0 0 10px 10px;">
        <p style="margin: 0;">Người gửi</p>
        <h3>Admin</h3>
    </div>
</div>
