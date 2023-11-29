<?php

namespace App\Notifications;

use App\Models\Respuesta;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\BroadcastMessage;

class NuevaRespuesta extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public $respuesta;
    public function __construct(Respuesta $respuesta)
    {
        //
        $this->respuesta = $respuesta;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database', 'broadcast'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toDatabase(object $notifiable): array
    {
        return [
            //
            'respuesta_id' => $this->respuesta->id,
            'title' => $this->respuesta->title,
            'message' => 'El taller ' . $this->respuesta->workshop->name . ' te ha enviado una cotización. Haz clic para verla.',
            'created_at' => $this->respuesta->created_at
        ];
    }

    public function toBroadcast(object $notifiable): BroadcastMessage
    {
        return new BroadcastMessage([]);
    }
}
