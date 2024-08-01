<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use NotificationChannels\Telegram\TelegramMessage;

class SendNewUserNotification extends Notification
{
    use Queueable;

    protected $transaction;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($transaction)
    {
        $this->transaction = $transaction;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
        // return ['telegram'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $mailData = [
            'name' => $this->transaction->user->name,
            'email' => $this->transaction->user->email,
            'gender' => $this->transaction->user->student->gender,
            'phone_number' => $this->transaction->user->student->phone_number,
            'code' => $this->transaction->code,
            'program' => $this->transaction->program->name,
            'price' => number_format($this->transaction->program->price),
            'period' => $this->transaction->program->period->period_date,
            'down_payment' => number_format($this->transaction->down_payment)
        ];

        return (new MailMessage)->markdown(
            'proton::email.signature',
            ['mailData' => $mailData]
        );

        // $url = url('/payment/' . $this->transaction->id . '/down-payment');

        // return (new MailMessage)
        // ->template('emails.template.inlineNotification')
        // ->greeting('Hello!')
        // ->line('One of your invoices has been paid!' . $this->transaction->user->name)
        // ->lineIf($this->amount > 0, "Amount paid: {$this->amount}")
        // ->action('View Invoice', $url)
        // ->line('Thank you for using our application!');
    }

    public function toTelegram($notifiable)
    {
        $content = 'User Terbaru' . PHP_EOL;
        $content .= 'Tanggal Daftar : ' . $this->transaction->user->created_at . PHP_EOL;
        $content .= 'Nama: ' . $this->transaction->user->name . PHP_EOL;
        $content .= 'Email: ' . $this->transaction->user->email . PHP_EOL;

        return TelegramMessage::create()
            ->to(env('TELEGRAM_BOT_GROUPID', '-4233743256'))
            ->content($content);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
