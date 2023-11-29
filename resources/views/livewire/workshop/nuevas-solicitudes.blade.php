<div>
    {{-- Stop trying to control. --}}
    <div class="card" style="min-height: 600px">
        <div class="card-header border-0">
            <h4 class="heading mb-0">Solicitudes Nuevas</h4>
            <div>
                <a href="#" class="text-primary me-2">Ver Todo</a>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="dt-do-bx">
                <div class="dropzoneContainer to-dodroup dz-scroll">
                    @foreach ($assistances as $asis)
                        <div class="sub-card draggable-handle draggable">
                            <div class="d-items">
                                <div class="d-flex justify-content-between flex-wrap">
                                    <div class="d-items-2">
                                        <div>
                                            <div>
                                                <h4>{{ $asis->title }}</h4>
                                                <label for="">{{ $asis->client->user->first_name }}
                                                    {{ $asis->client->user->last_name }}</label>
                                            </div>
                                            <span>{{ $asis->created_at }}</span>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="icon-box icon-box-md bg-danger-light me-1">
                                            <a href="{{ route('w-preview', ['id' => $asis->id]) }}" class="btn btn-success shadow btn-xs sharp me-1"><i
                                                    class="fa fa-eye"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
