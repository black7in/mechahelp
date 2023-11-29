    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <div class="card box-hover">
        <div class="card-header">
            <h5 class="mb-0">DETALLES DE SOLICITUD DE ASISTENCIA</h5>
        </div>
        <div class="card-body">
            <div class="products style-1">
                <div>
                    <h5>Titulo: {{ $assistance->title }}</h5>
                    <span>Fecha: {{ $assistance->created_at }}</span>
                </div>
            </div>
            <div>
                <p class="text-secondary mb-1 font-w500">Descripcion:</p>
                <p class="">{{ $assistance->description }}</p>
            </div>
            <div>
                <p class="text-secondary mb-1 font-w500">Vehiculo</p>
                <p class=""><strong>Marca: </strong>{{ $assistance->vehicle->marca }} <strong>Modelo: </strong> {{ $assistance->vehicle->modelo }} <strong>Año: </strong>{{ $assistance->vehicle->año }}</p>

            </div>
            <div>
                <p class="text-secondary mb-1 font-w500">Imagenes</p>
                <div class="profile-interest">
                    <div class="row mt-4 sp4" id="lightgallery">
                        @foreach ($assistance->media as $img)
                            @if ($img->type == 0)
                                <a href="{{ asset('storage/' . $img->path) }}"
                                    data-exthumbimage="{{ asset('storage/' . $img->path) }}"
                                    data-src="{{ asset('storage/' . $img->path) }}"
                                    class="mb-1 col-lg-4 col-xl-4 col-sm-4 col-6">
                                    <img src="{{ asset('storage/' . $img->path) }}" alt=""
                                        class="img-fluid rounded"
                                        style="width: 150px; height: 150px; object-fit: cover;">
                                </a>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <div>
                <p class="text-secondary mb-1 font-w500">Audio</p>
                <audio controls>
                    <source src="{{ asset('storage/' . $assistance->media->where('type', 1)->first()->path) }}"
                        type="audio/mp3">
                    Tu navegador no soporta la etiqueta de audio.
                </audio>
            </div>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-secondary mt-3" data-bs-toggle="modal"
                data-bs-target="#exampleModalCenter"><i class="fa-solid fa-location-dot me-2"></i>Ubicacion</button>
            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Google Maps</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal">
                            </button>
                        </div>
                        <div class="modal-body">
                            <div id="world-map">
                                <div id='map' style="height:100%; width: 100%;"></div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer d-flex justify-content-between flex-wrap">
        </div>
    </div>
    <script>
        let map;

        async function initMap() {
            // This is santa cruz de la sierra
            const position = {
                lat: -17.783335002769086,
                lng: -63.18213080801206
            };
            const {
                Map
            } = await google.maps.importLibrary("maps");
            const {
                AdvancedMarkerElement
            } = await google.maps.importLibrary("marker");

            map = new Map(document.getElementById("map"), {
                center: position,
                mapId: "DEMO_MAP_ID",
                zoom: 15,
            });
            infoWindow = new google.maps.InfoWindow();

            const marker = new AdvancedMarkerElement({
                map: map,
                position: position,
                title: "Posicion",
            });

        }
    </script>
    <script async
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCo0M8AMhKxwCQNdqP2JDhtNDo-OIOBIHQ&callback=initMap"></script>
