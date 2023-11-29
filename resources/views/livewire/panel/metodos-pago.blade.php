<div>
    {{-- Success is as dangerous as failure. --}}
    <div class="row">
        <div class="col-md-5">
            <div class="card" style="max-height: 250px">
                <div class="card-body" wire:ignore>
                    <div class="form-group mb-3">
                        <label for="cc-name" class="form-label">Nombre de Tarjeta</label>
                        <input type="text" class="form-control" id="card-holder-name"
                            placeholder="Nombre del propietario">
                        <small class="text-muted">Full name as displayed on card</small>
                        <div class="invalid-feedback">
                            Name on card is required
                        </div>
                    </div>

                    <div class="form-group">
                        <div id="card-element" class="form-control"></div>
                    </div>
                    <!-- Stripe Elements Placeholder -->
                    <div class="form-group mt-3">
                        <button class="btn btn-primary btn-lg btn-block" id="card-button"
                            data-secret="{{ $intent->client_secret }}">Añadir Metodo de Pago</button>
                    </div>
                </div>

            </div>
            <div class="card">
                <div class="card-header">
                    <h6>Metodos de Pago</h6>
                </div>
                <div class="card-body">
                    <div class="events">
                        <h6>Tarjetas</h6>
                        @foreach ($paymentMethods as $paymentMethod)
                            <div class="event-media">
                                <div class="d-flex align-items-center">
                                    <div class="event-data ms-2">
                                        <h5 class="mb-0"><i class="fa-regular fa-credit-card"></i><strong>
                                                {{ $paymentMethod->billing_details->name }}:</strong>
                                            xxxx-{{ $paymentMethod->card->last4 }}</h5>
                                        <span>Expira: {{ $paymentMethod->card->exp_month }}/2025</span>
                                    </div>
                                </div>
                                <div class="">
                                    <a wire:click='defaultPaymentMethod("{{ $paymentMethod->id }}")'
                                        class="btn btn-primary shadow btn-xs sharp me-1">
                                        @if (auth()->user()->defaultPaymentMethod() &&
                                                auth()->user()->defaultPaymentMethod()->id == $paymentMethod->id)
                                            <i class="fa-solid fa-star" style="color: #FFD700;"></i>
                                        @else
                                            <i class="fa-solid fa-star"></i>
                                        @endif
                                    </a>
                                    <a href="#" class="btn btn-primary shadow btn-xs sharp me-1"><i
                                            class="fa-solid fa-trash"></i></a>
                                </div>

                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="card" wire:ignore>
                <div class="card-header">
                    <h5>Mis Facturas</h5>
                </div>
                <div class="card-body pt-0">
                    <div class="table-responsive">
                        <table class="table table-striped table-responsive-sm">
                            <thead>
                                <tr>
                                    <th>Fecha</th>
                                    <th>Importe</th>
                                    <th class="text-end">Descargar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($invoices as $invoice)
                                    <tr>
                                        <td>{{ $invoice->date()->toFormattedDateString() }}</td>
                                        <td>{{ $invoice->total() }}</td>
                                        <td class="text-end">
                                            <button type="button" class="btn btn-warning"
                                                data-href="/user/invoice/{{ $invoice->id }}"
                                                onclick="window.location.href = this.dataset.href;">
                                                <span class="btn-icon-start text-warning">
                                                    <i class="fa fa-download color-warning"></i>
                                                </span>Download
                                            </button>
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
    <script src="https://js.stripe.com/v3/"></script>

    <script>
        const stripe = Stripe("{{ env('STRIPE_KEY') }}");

        const elements = stripe.elements();
        const cardElement = elements.create('card');

        cardElement.mount('#card-element');
    </script>
    <script>
        const cardHolderName = document.getElementById('card-holder-name');
        const cardButton = document.getElementById('card-button');


        cardButton.addEventListener('click', async (e) => {

            cardButton.disabled = true;

            const clientSecret = cardButton.dataset.secret;

            const {
                setupIntent,
                error
            } = await stripe.confirmCardSetup(
                clientSecret, {
                    payment_method: {
                        card: cardElement,
                        billing_details: {
                            name: cardHolderName.value
                        }
                    }
                }
            );

            cardButton.disabled = false;

            if (error) {
                // Display "error.message" to the user...
                console.log(error)
            } else {
                // The card has been verified successfully...
                @this.addPaymentMethod(setupIntent.payment_method);

                cardHolderName = '';
                cardElement.clear();
            }
        });
    </script>
</div>
