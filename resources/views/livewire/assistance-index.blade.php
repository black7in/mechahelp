<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <div class="row">
        <div class="col-xl-6">
            <div class="card" id="card-title-1">
                <div class="card-header border-0 pb-0 ">
                    <h5 class="card-title">Solicitar nueva asistencia</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">Solicita una nueva asistencia, por favor debes explicar el problema que esta
                        teniendo para ayudar a los talleres a identificar el problema y puedan ofrecerte un buen
                        servicio.
                    </p>

                    <form wire:submit='create'>
                        <div class="row">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label">Titulo</label>
                                        <input type="text" wire:model='title' class="form-control"
                                            placeholder="Ingresa el titulo">
                                        @error('title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label">Vehiculo</label>
                                        <div class="input-group">
                                            <select wire:model='vehicle' class="default-select form-control wide bleft">
                                                <option selected="">Elegir...</option>
                                                @foreach ($vehicles as $vehicle)
                                                    <option value="{{ $vehicle->id }}">{{ $vehicle->marca }}
                                                        {{ $vehicle->modelo }}</option>
                                                @endforeach
                                            </select>
                                            <button class="btn btn-primary" type="button">Nuevo</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label">Descripción</label>
                                <textarea name="description" wire:model='description' cols="30" rows="4" class="form-control"
                                    placeholder="Ingresa la descripcion de tu problema"></textarea>
                            </div>

                            <div class="form-group mb-3">
                                <label for="audio">Audio:</label>
                                <div class="main-controls d-flex align-items-center mb-2">
                                    <button type="button" class="btn btn-primary btn-icon-xxs record" id="startButton">
                                        <i class="fa-solid fa-microphone"></i>
                                    </button>
                                    <button type="button" class="stop btn btn-primary btn-icon-xxs" id="stopButton"
                                        style="display: none">
                                        <i class="fa-solid fa-microphone-slash"></i>
                                    </button>
                                    <p id="recordingTime" class="ml-3 !important">Recording Time: 0:00</p>

                                </div>

                                <!-- Coloca el elemento <audio> debajo de los controles principales -->
                                <audio id="recordedAudio" controls></audio>


                                <input wire:model="audioFile" wire:key="{{ $audioKey }}" type="file"
                                    id="audioFileInput" name="audioFile" accept="audio/*" class="form-control"
                                    style="display: none;">
                                @error('audioFile')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label">Imagenes</label>
                                <div class="input-group">
                                    <input type="file" wire:model ="photos" wire:key="{{ $photoKey }}"
                                        class="form-control" multiple>
                                </div>
                            </div>

                            <div wire:ignore class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Ubicación</h4>
                                    <button id="gpsButton" type="button" class="btn btn-primary btn-icon-xs"><i
                                            class="fa-solid fa-location-crosshairs"></i></button>
                                </div>
                                <div class="card-body">
                                    <div id="world-map">
                                        <div id='map' style="height:100%; width: 100%;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header border-0 pb-0 ">
                    <h5 class="card-title">Mis Solicitudes</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table header-border table-responsive-sm">
                            <thead>
                                <tr>
                                    <th>Titulo</th>
                                    <th>Vehiculo</th>
                                    <th>Estado</th>
                                    <th>Fecha</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($assistances as $assistance)
                                    <tr>
                                        <td>{{ $assistance->title }}</td>
                                        <td>
                                            {{ $assistance->vehicle->marca }} {{ $assistance->vehicle->modelo }}
                                        </td>
                                        <td>
                                            @switch($assistance->status)
                                                @case(0)
                                                    <span class="badge badge-rounded badge-secondary">Enviado</span>
                                                @break

                                                @case(1)
                                                    <span class="badge badge-rounded badge-warning">En Esperar</span>
                                                @break

                                                @case(2)
                                                    <span class="badge badge-rounded badge-pill">En Camino</span>
                                                @break

                                                @case(3)
                                                    <span class="badge badge-rounded badge-success">En Proceso</span>
                                                @break

                                                @case(4)
                                                    <span class="badge badge-rounded badge-success">Por Pagar</span>
                                                @break

                                                @default
                                                    <span class="badge badge-rounded badge-danger">Finalizado</span>
                                            @endswitch
                                        </td>
                                        <td>
                                            {{ $assistance->created_at }}
                                        </td>
                                        <td class="align-middle text-center">
                                            <div class="d-flex justify-content-center">
                                                <a href="{{ route('show-assistance', ['id' => $assistance->id]) }}"
                                                    class="btn btn-primary shadow btn-xs sharp me-1"><i
                                                        class="fa fa-eye"></i></a>
                                            </div>
                                        </td>

                                    </tr>
                                @endforeach


                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    let map;

    function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(
            browserHasGeolocation ?
            "Error: The Geolocation service failed." :
            "Error: Your browser doesn't support geolocation."
        );
        infoWindow.open(map);
    }

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
            title: "Uluru",
        });
        const locationButton = document.getElementById("gpsButton");

        locationButton.addEventListener("click", () => {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    (position) => {
                        const pos = {
                            lat: position.coords.latitude,
                            lng: position.coords.longitude,
                        };

                        infoWindow.open(map);

                        const marker2 = new AdvancedMarkerElement({
                            map: map,
                            position: pos,
                            title: "Mi posición",
                        });

                        map.setCenter(pos);

                        @this.setLat(pos.lat);
                        @this.setLng(pos.lng);
                        //initMap();*/
                    },
                    () => {
                        handleLocationError(true, infoWindow, map.getCenter());
                    }
                );
            } else {
                handleLocationError(false, infoWindow, map.getCenter());
            }
        });
    }
</script>
<script async
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCo0M8AMhKxwCQNdqP2JDhtNDo-OIOBIHQ&callback=initMap"></script>

<script>
    const record = document.getElementById('startButton'); // Cambia 'record' a 'startButton'
    const stop = document.getElementById('stopButton'); // Cambia 'stop' a 'stopButton'
    const recordedAudio = document.getElementById('recordedAudio');
    const recordingTimeElement = document.getElementById('recordingTime');
    const audioFileInput = document.getElementById('audioFileInput');
    let recordingInterval;
    let audioChunks = [];
    let isRecording = false;
    let startTime;

    // Oculta el botón de "Detener" inicialmente
    stop.style.display = 'none';

    if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
        console.log('getUserMedia supported.');

        const constraints = {
            audio: true
        };

        navigator.mediaDevices.getUserMedia(constraints)
            .then((stream) => {
                const mediaRecorder = new MediaRecorder(stream);

                record.onclick = (e) => {
                    mediaRecorder.start();
                    console.log('recorder started');

                    stop.style.display = 'inline';
                    startTime = Date.now();
                    updateRecordingTime();
                    recordingInterval = setInterval(updateRecordingTime, 1000);
                };

                stop.onclick = (e) => {
                    //e.preventDefault();
                    mediaRecorder.stop();
                    console.log('recorder stopped');
                    record.style.background = '';
                    record.style.color = '';
                };

                mediaRecorder.onstart = () => {
                    isRecording = true;
                    audioChunks = [];
                };

                mediaRecorder.onstop = (e) => {
                    isRecording = false;
                    clearInterval(recordingInterval);

                    if (audioChunks.length > 0) {
                        const audioBlob = new Blob(audioChunks, {
                            type: 'audio/wav'
                        });

                        const audioFile = new File([audioBlob], 'recording.wav', {
                            type: 'audio/wav'
                        });
                        const fileList = new DataTransfer();
                        fileList.items.add(audioFile);

                        audioFileInput.files = fileList.files;

                        const audioURL = window.URL.createObjectURL(audioBlob);
                        recordedAudio.src = audioURL;
                        recordedAudio.controls = true;

                        let file = document.querySelector('input[type="file"]').files[0]
                        @this.upload('audioFile', file, (uploadedFilename) => {
                            console.log('OK')

                        }, () => {
                            console.log('ERROR')
                        }, (event) => {
                            console.log('En proceso')
                        })
                    }

                    updateRecordingTime();
                };

                mediaRecorder.ondataavailable = (e) => {
                    if (isRecording && e.data.size > 0) {
                        audioChunks.push(e.data);
                    }
                };
            })
            .catch((err) => {
                console.log('The following error occurred:', err);
            });

    } else {
        console.log('getUserMedia not supported on your browser!');
    }

    function updateRecordingTime() {
        const elapsedTime = Date.now() - startTime;
        const minutes = Math.floor(elapsedTime / 60000);
        const seconds = Math.floor((elapsedTime % 60000) / 1000);
        const timeString = `${minutes}:${(seconds < 10 ? '0' : '')}${seconds}`;

        recordingTimeElement.textContent = `Recording Time: ${timeString}`;
    }
</script>
