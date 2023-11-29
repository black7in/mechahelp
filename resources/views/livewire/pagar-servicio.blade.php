<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header border-0 pb-0">
                    <h5 class="card-title">PAGAR SERVICIO</h5>
                </div>
                <div class="card-body">
                    <ul>
                        <li>
                            <h4>Serivicio: {{$assistance->title}}</h4>
                        </li>
                        <li>
                            <h4>Detalles:</h4>
                            <p>{{$assistance->tarea->detail}}</p>
                        </li>
                        <li>
                            <h4>Monto: {{$assistance->price}}</h4>
                        </li>
                    </ul>

                    <ul class="list-unstyled">
                        <li class="mb-2">
                            <button class="btn btn-light w-100" wire:click="pagar()">
                                <img src="https://1000marcas.net/wp-content/uploads/2019/12/Visa-Logo-2005.jpg"
                                    alt="" style="height: 2rem;">
                            </button>
                        </li>
                        <li>
                            <button class="btn btn-light w-100">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/39/PayPal_logo.svg/527px-PayPal_logo.svg.png"
                                    alt="" style="height: 2rem;">
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
