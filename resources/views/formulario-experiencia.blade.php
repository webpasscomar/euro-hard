@extends('layouts.app')

@section('content')
    <div class="main-container">
        <div class="container-hero">
            <div class="container-fluid">
                <div class="container-title-hero">
                    <div class="content-icon-EH-hero">
                        <img src="{{ asset('images/icono-EH-gris.svg') }}" class="icon-EH-hero">
                    </div>
                    <h1 class="title-hero">Contanos tu experiencia</h1>
                </div>
            </div>
            <div class="img-hero">
                <div class="img-overlay-contacto"></div>
                <img src="{{ asset('img/headers/form-experiencia.jpg') }}" alt="Experiencia">
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col">
                    <h5 class="title-category gris">
                        Formulario - <span class="negro">Experiencia EH</span>
                    </h5>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="content-colum-form-izq">
                        <div class="description-nove">
                            Los invitamos a realizar la siguiente encuesta para continuar garantizando la satisfacción que
                            brinda
                            EUROHARD. Toda las respuestas que usted nos brinde serán confidenciales, de uso exclusivo del
                            área de
                            marketing.
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="content-colum-contact-der">
                        <form class="row" id="sectionForm" method="POST"
                            action="{{ route('formularios.envio.experiencia') }}">
                            @csrf
                            <label class="label-forms">Nombre y apellido
                                <span class="requerido">*</span></label>
                            <input type="text" name="fullName"
                                class="form-control contact-content @error('fullName') is-invalid @enderror"
                                value="{{ old('fullName') }}">
                            @error('fullName')
                                <p class="text-danger p-0">{{ $message }}</p>
                            @enderror
                            <label class="label-forms">Teléfono <span class="requerido">*</span></label>
                            <input type="text" name="phone" value="{{ old('phone') }}"
                                class="form-control contact-content @error('phone') is-invalid @enderror">
                            @error('phone')
                                <p class="text-danger p-0">{{ $message }}</p>
                            @enderror
                            <label class="label-forms">Correo electrónico <span class="requerido">*</span></label>
                            <input type="email" name="email" value="{{ old('email') }}"
                                class="form-control contact-content @error('email') is-invalid @enderror" id="inputEmail4">
                            @error('email')
                                <p class="text-danger p-0">{{ $message }}</p>
                            @enderror
                            <label class="label-forms">Marque la opcion correspondiente <span
                                    class="requerido">*</span></label>
                            <div class="check-content">
                                <div class="check-individual">
                                    <div class="row">
                                        <div class="col-lg-4 content-check-input">
                                            <input type="checkbox" name="client" id="checkDistri" value="distribuidor"
                                                class="only-one myinput large" @checked(old('client') == 'distribuidor')>
                                            Es distribuidor
                                        </div>
                                        <div class="col-lg-4 content-check-input">
                                            <input type="checkbox" name="client" id="checkConFin" value="consumidor final"
                                                @checked(old('client') == 'consumidor final') class="only-one myinput large"> Es consumidor
                                            final
                                        </div>
                                        <div class="col-lg-4 content-check-input">
                                            <input type="checkbox" role="radio" name="client" id="checkOtros"
                                                value="otros" class="only-one myinput large" @checked(old('client') == 'otros')>
                                            Otros
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @error('client')
                                <p class="text-danger p-0">{{ $message }}</p>
                            @enderror
                            <div class="mt-2 mb-4">
                                @error('g-recaptcha-response')
                                    <p class="text-danger p-0">{{ $message }}</p>
                                @enderror
                            </div>
                            <button class="btn btn-primary btn-form">Enviar</button>
                        </form>

                        <script type="text/javascript">
                            document.addEventListener('DOMContentLoaded', function() {
                                let Checked = null;

                                // Obtener los checkboxes y asignar el estado inicial (Laravel "old()")
                                const checkboxes = document.getElementsByClassName('only-one');
                                for (let CheckBox of checkboxes) {
                                    if (CheckBox.checked) {
                                        Checked = CheckBox; // Marcar el checkbox inicial si viene de `old()`
                                    }

                                    CheckBox.onclick = function() {
                                        if (Checked === this) {
                                            // Permitir desmarcar el checkbox actual
                                            this.checked = false;
                                            Checked = null; // Resetear la variable
                                        } else {
                                            if (Checked != null) {
                                                Checked.checked = false; // Desmarcar el anterior
                                            }
                                            Checked = this; // Actualizar al nuevo checkbox
                                        }
                                    };
                                }
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
