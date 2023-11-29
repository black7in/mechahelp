<?php

namespace App\Notifications;

use App\Models\Assistance;
use App\Models\Respuesta;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Carbon;

class RespuestaAceptada extends Notification
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
        $assistance = optional($this->respuesta)->assistance;
        $clientFirstName = optional($assistance->client->user)->first_name;

        return [
            'assistance_id' => optional($assistance)->id,
            'title' => 'Tu propuesta fue la mejor',
            'message' => 'Fuiste elegido para dar soporte al cliente ' . $clientFirstName . '. Click para asignar un mecanico lo mas pronto posible!',
            'created_at' => Carbon::now(),
        ];
    }

    public function toBroadcast(object $notifiable): BroadcastMessage
    {
        return new BroadcastMessage([]);
    }
}
