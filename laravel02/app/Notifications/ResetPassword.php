<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Lang;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ResetPassword extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */

    public $token;

    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        //$url = route('password.reset', $this->token);
        $url = route('password.reset').'?token='.$this->token;
        $expire = config('auth.passwords.'.config('auth.defaults.passwords').'.expire');
        return (new MailMessage())
        ->subject("Lấy lại mật khẩu")
        ->line("Bạn nhận được email này vì chúng tôi đã nhận được yêu cầu đặt lại mật khẩu cho tài khoản của bạn")
        ->action("Đặt lại", $url)
        ->line('Link này chỉ tồn tại trong '.$expire.' phút.')
        ->line("Nếu bạn không yêu cầu đặt lại mật khẩu thì không cần thực hiện thêm hành động nào");
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
