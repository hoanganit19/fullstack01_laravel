Một số câu lệnh

1. Tạo file html của template email

php artisan vendor:publish --tag=laravel-mail

2. Tạo nội dung notification (html)

php artisan vendor:publish --tag=laravel-notifications

refresh_token

- id
- token
- user_id
- created_at
- updated_at

Khi accessToken hết hạn => Client gửi Refresh => So sánh DB => Trả user_id => Lấy thông tin user (Instance) => Tạo token mới => Trả về client

Lưu ý: Thiết lập 1 ngày dọn accessToken hết hạn

Khi đăng xuất:

- Xóa accessToken
- Xóa refreshToken

Dọn các refreshToken hết hạn


