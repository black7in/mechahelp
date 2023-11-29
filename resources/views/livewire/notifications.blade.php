<li class="nav-item dropdown notification_dropdown">
    <a class="nav-link position-relative" role="button" data-bs-toggle="dropdown">
        <i class="fa-solid fa-bell" style="color: aliceblue; width: 24px; height: 24px;"><span
                class="position-absolute translate-middle badge badge-circle badge-danger text-center"
                style="font-size: 8px; width: 20px; height: 20px;">
                {{ auth()->user()->unReadNotifications->count() }}
            </span>
        </i>

    </a>

    <div class="dropdown-menu dropdown-menu-end">
        <div id="DZ_W_Notification1" class="widget-media dz-scroll p-3" style="height:380px;">
            <ul class="timeline">
                @forelse (auth()->user()->notifications as $notification)
                    <li wire:click="marcarComoLeido('{{ $notification->id }}')">
                        <div class="timeline-panel">
                            <div class="media-body">
                                @if ($notification->type == 'App\Notifications\NuevaSolicitud')
                                    <h5 class="{{ $notification->read_at ? 'text-muted' : 'text-success' }}">
                                        <i class="fa-solid fa-truck-medical"
                                            style="font-size: 1.2em; margin-right: 5px;"></i>
                                        {{ $notification->data['message'] }}
                                    </h5>
                                    <h6 class=""><strong>{{ $notification->data['title'] }}</strong></h6>
                                    <p class="">{{ $notification->data['autor'] }}</p>
                                    <small class="">{{ $notification->created_at->diffForHumans() }}</small>
                                @elseif($notification->type == 'App\Notifications\NuevaRespuesta')
                                    <h5 class="{{ $notification->read_at ? 'text-muted' : 'text-success' }}">
                                        <i class="fa-solid fa-comment-dots"
                                            style="font-size: 1.2em; margin-right: 5px;"></i>
                                        {{ $notification->data['title'] }}
                                    </h5>
                                    <p class="">{{ $notification->data['message'] }}</p>
                                    <small class="">{{ $notification->created_at->diffForHumans() }}</small>
                                @elseif($notification->type == 'App\Notifications\MecanicoLLega')
                                    <h5 class="{{ $notification->read_at ? 'text-muted' : 'text-success' }}">
                                        <i class="fa-solid fa-thumbs-up"
                                            style="font-size: 1.2em; margin-right: 5px;"></i>
                                        {{ $notification->data['title'] }}
                                    </h5>
                                    <p class="">{{ $notification->data['message'] }}</p>
                                    <small class="">{{ $notification->created_at->diffForHumans() }}</small>
                                @elseif($notification->type == 'App\Notifications\NuevoStrike')
                                    <h5 class="{{ $notification->read_at ? 'text-muted' : 'text-danger' }}">
                                        <i class="fa-solid fa-circle-exclamation" style="font-size: 1.2em; margin-right: 5px;"></i>
                                        {{ $notification->data['title'] }}
                                    </h5>
                                    <p class="">{{ $notification->data['message'] }}</p>
                                    <small class="">{{ $notification->created_at->diffForHumans() }}</small>
                                @else
                                    <h5 class="{{ $notification->read_at ? 'text-muted' : 'text-success' }}">
                                        <i class="fa-solid fa-check" style="font-size: 1.2em; margin-right: 5px;"></i>
                                        {{ $notification->data['title'] }}
                                    </h5>
                                    <p class="">{{ $notification->data['message'] }}</p>
                                    <small class="">{{ $notification->created_at->diffForHumans() }}</small>
                                @endif

                            </div>
                        </div>
                    </li>
                @empty
                    <h6 class="mb-1">Sin notificaciones</h6>
                @endforelse

            </ul>
        </div>
        <a class="all-notification" href="javascript:void(0);">See all notifications <i class="ti-arrow-end"></i></a>
    </div>
</li>
