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

class MecanicoAsignado extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */

    public $assistance;
    public function __construct( Assistance $assistance)
    {
        //
        $this->assistance = $assistance;
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
        $respuestaGanadora = Respuesta::where('assistance_id', $this->assistance->id)->where('status', 1)->first();
        return [
            'assistance_id' => optional($this->assistance)->id,
            'title' => 'Mecanico Asignado',
            'message' => 'El mecanico ya esta en camino, tiempo de llegada aprox: ' . $respuestaGanadora->time . 'm.',
            'created_at' => Carbon::now(),
        ];
    }

    public function toBroadcast(object $notifiable): BroadcastMessage
    {
        return new BroadcastMessage([]);
    }
}
