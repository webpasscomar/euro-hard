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
                        <form class="row" id="sectionForm">
                            <label class="label-forms">Nombre y apellido <span class="requerido">*</span></label>
                            <input type="text" class="form-control contact-content" required>
                            <label class="label-forms">Teléfono <span class="requerido">*</span></label>
                            <input type="text" class="form-control contact-content" required>
                            <label class="label-forms">Correo electrónico <span class="requerido">*</span></label>
                            <input type="email" class="form-control contact-content" id="inputEmail4" required>
                            <label class="label-forms">Marque la opcion correspondiente <span
                                    class="requerido">*</span></label>
                            <div class="check-content">
                                <div class="check-individual">
                                    <div class="row">
                                        <div class="col-lg-4 content-check-input">
                                            <input type="checkbox" name="Distribuidor" id="checkDistri" value="1"
                                                class="only-one myinput large"> Es distribuidor
                                        </div>
                                        <div class="col-lg-4 content-check-input">
                                            <input type="checkbox" name="ConsumidorFinal" id="checkConFin" value="2"
                                                class="only-one myinput large"> Es consumidor final
                                        </div>
                                        <div class="col-lg-4 content-check-input">
                                            <input type="checkbox" name="Otros" id="checkOtros" value="3"
                                                class="only-one myinput large">
                                            Otros
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary btn-form">Enviar</button>
                        </form>
                        <script type="text/javascript">
                            let Checked = null;
                            //The class name can vary
                            for (let CheckBox of document.getElementsByClassName('only-one')) {
                                CheckBox.onclick = function() {
                                    if (Checked != null) {
                                        Checked.checked = false;
                                        Checked = CheckBox;
                                    }
                                    Checked = CheckBox;
                                }
                            }

                            (function() {
                                const form = document.querySelector('#sectionForm');
                                const checkboxes = form.querySelectorAll('input[type=checkbox]');
                                const checkboxLength = checkboxes.length;
                                const firstCheckbox = checkboxLength > 0 ? checkboxes[0] : null;

                                function init() {
                                    if (firstCheckbox) {
                                        for (let i = 0; i < checkboxLength; i++) {
                                            checkboxes[i].addEventListener('change', checkValidity);
                                        }

                                        checkValidity();
                                    }
                                }

                                function isChecked() {
                                    for (let i = 0; i < checkboxLength; i++) {
                                        if (checkboxes[i].checked) return true;
                                    }

                                    return false;
                                }

                                function checkValidity() {
                                    const errorMessage = !isChecked() ? 'Se debe seleccionar una opción.' : '';
                                    firstCheckbox.setCustomValidity(errorMessage);
                                }

                                init();
                            })();
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
