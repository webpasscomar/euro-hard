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
                <img src="{{ asset('images/slider-home-6.jpg') }}">
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col">
                    <h5 class="title-category gris">
                        Formulario - Experiencia EH - <span class="negro">Es distribuidor</span>
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
                        <form action="{{ route('formularios.envio.distribuidores') }}" method="POST" class="row"
                            id="sectionForm">
                            @csrf
                            <label class="label-forms">Nombre y apellido <span class="requerido">*</span></label>
                            <input type="text"
                                class="form-control contact-content @error('fullName') is-invalid @enderror" name="fullName"
                                value="{{ old('fullName') }}">
                            @error('fullName')
                                <p class="text-danger p-0">{{ $message }}</p>
                            @enderror
                            <label class="label-forms">Teléfono <span class="requerido">*</span></label>
                            <input type="text" name="phone"
                                class="form-control contact-content @error('phone') is-invalid @enderror"
                                value="{{ old('phone') }}">
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
                                                @checked(old('client') == 'distribuidor') class="only-one myinput large"> Es distribuidor
                                        </div>
                                        <div class="col-lg-4 content-check-input">
                                            <input type="checkbox" name="client" id="checkConFin" value="consumidor final"
                                                @checked(old('client') == 'consumidor final') class="only-one myinput large"> Es
                                            consumidor final
                                        </div>
                                        <div class="col-lg-4 content-check-input">
                                            <input type="checkbox" name="client" id="checkOtros" value="otros"
                                                @checked(old('client') == 'otros') class="only-one myinput large">
                                            Otros
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @error('client')
                                <p class="text-danger p-0">{{ $message }}</p>
                            @enderror
                            <label class="label-forms">Provincia en la que comercializa los productos EUROHARD <span
                                    class="requerido">*</span></label>
                            <select class="form-select contact-content @error('province') is-invalid @enderror"
                                aria-label="Default select example" name="province">
                                <option value="">Seleccione la provincia</option>
                                @foreach ($provincias as $provincia)
                                    <option value="{{ $provincia->name }}" @selected(old('province') == $provincia->name)>
                                        {{ Str::title($provincia->name) }}</option>
                                @endforeach
                            </select>
                            @error('province')
                                <p class="text-danger p-0">{{ $message }}</p>
                            @enderror
                            <label class="label-forms mt-2">Indique las familias de producto que comercializa <span
                                    class="requerido">*</span></label>
                            <div class="check-content" id="sectionFormFamilia">
                                <div class="check-individual">
                                    <div class="row mt-2">
                                        @foreach ($productos_comerciales as $producto)
                                            <div class="col-lg-4 content-check-input">
                                                <input type="checkbox" name="products[]" value="{{ $producto->name }}"
                                                    class="myinput large" @checked(in_array($producto->name, old('products', [])))>
                                                {{ Str::ucfirst($producto->name) }}
                                            </div>
                                        @endforeach
                                    </div>
                                    @error('products')
                                        <p class="text-danger p-0 mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <label class="label-forms">¿Tuvo algún inconveniente con los productos EUROHARD? <span
                                    class="requerido">*</span></label>
                            <div class="check-content" id="sectionFormProblemas">
                                <div class="check-individual">
                                    <div class="row">
                                        <div class="col-lg-4 content-check-input">
                                            <input type="checkbox" name="inconvenient" id="Si" value="si"
                                                class="only-one-inconvenient myinput large" @checked(old('inconvenient') == 'si')>
                                            Si
                                        </div>
                                        <div class="col-lg-4 content-check-input">
                                            <input type="checkbox" name="inconvenient" id="No" value="no"
                                                class="only-one-inconvenient myinput large" @checked(old('inconvenient') == 'no')>
                                            No
                                        </div>
                                    </div>
                                </div>
                                @error('inconvenient')
                                    <p class="text-danger p-0 mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <textarea class="form-control contact-content @error('inconvenient_description') is-invalid @enderror"
                                name="inconvenient_description" id="Inconvenientes" rows="8" aria-label="Inconvenientes">{{ old('inconvenient_description') }}</textarea>
                            @error('inconvenient_description')
                                <p class="text-danger p-0 mt-1">{{ $message }}</p>
                            @enderror
                            {{-- Errores de captcha --}}
                            <div class="mt-2 mb-4">
                                @error('g-recaptcha-response')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary btn-form">Enviar</button>
                        </form>
                        <script type="text/javascript">
                            document.addEventListener('DOMContentLoaded', function() {
                                let Checked = null;
                                let checkedInconvenient = null;
                                // Obtener los checkboxes y asignar el estado inicial (Laravel "old()")
                                // Chequear tipo de cliente
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
                                // chequear inconveniente
                                const checkboxes = document.getElementsByClassName('only-one-inconvenient');
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
