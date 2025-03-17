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
                            <label class="label-forms">Provincia en la que comercializa los productos EUROHARD <span
                                    class="requerido">*</span></label>
                            <select class="form-select contact-content" aria-label="Default select example" required>
                                <option value="" selected>Seleccione la provincia</option>
                                <option value="Buenos Aires">Buenos Aires</option>
                                <option value="Ciudad Autónoma de Buenos Aires">Ciudad Autónoma de Buenos Aires</option>
                                <option value="Catamarca">Catamarca</option>
                                <option value="Chaco">Chaco</option>
                                <option value="Chubut">Chubut</option>
                                <option value="Córdoba">Córdoba</option>
                                <option value="Corrientes">Corrientes</option>
                                <option value="Entre Ríos">Entre Ríos</option>
                                <option value="Formosa">Formosa</option>
                                <option value="Jujuy">Jujuy</option>
                                <option value="La Pampa">La Pampa</option>
                                <option value="La Rioja">La Rioja</option>
                                <option value="Mendoza">Mendoza</option>
                                <option value="Misiones">Misiones</option>
                                <option value="Neuquén">Neuquén</option>
                                <option value="Río Negro">Río Negro</option>
                                <option value="Salta">Salta</option>
                                <option value="San Juan">San Juan</option>
                                <option value="San Luis">San Luis</option>
                                <option value="Santa Cruz">Santa Cruz</option>
                                <option value="Santa Fe">Santa Fe</option>
                                <option value="Santiago del Estero">Santiago del Estero</option>
                                <option value="Tierra del Fuego">Tierra del Fuego</option>
                                <option value="Tucumán">Tucumán</option>
                            </select>
                            <label class="label-forms">Indique las familias de producto que comercializa <span
                                    class="requerido">*</span></label>
                            <div class="check-content" id="sectionFormFamilia">
                                <div class="check-individual">
                                    <div class="row">
                                        <div class="col-lg-4 content-check-input">
                                            <input type="checkbox" name="Elementos de apoyo" id="1"
                                                value="Elementos de apoyo" class="myinput large"> Elementos de apoyo
                                        </div>
                                        <div class="col-lg-4 content-check-input">
                                            <input type="checkbox" name="Elementos de puerta" id="2"
                                                value="Elementos de puerta" class="myinput large"> Elementos de puerta
                                        </div>
                                        <div class="col-lg-4 content-check-input">
                                            <input type="checkbox" name="Elementos de cajón" id="3"
                                                value="Elementos de cajón" class="myinput large"> Elementos de cajón
                                        </div>
                                    </div>
                                    <div class="row filas-checkbox">
                                        <div class="col-lg-4 content-check-input">
                                            <input type="checkbox" name="Cerraduras" id="4" value="Cerraduras"
                                                class="myinput large"> Cerraduras
                                        </div>
                                        <div class="col-lg-4 content-check-input">
                                            <input type="checkbox" name="Elementos de unión" id="5"
                                                value="Elementos de unión" class="myinput large"> Elementos de unión
                                        </div>
                                        <div class="col-lg-4 content-check-input">
                                            <input type="checkbox" name="Barrales y tiradores" id="6"
                                                value="Barrales y tiradores" class="myinput large"> Barrales y tiradores
                                        </div>
                                    </div>
                                    <div class="row filas-checkbox">
                                        <div class="col-lg-4 content-check-input">
                                            <input type="checkbox" name="Accesorios de cocina" id="7"
                                                value="Accesorios de cocina" class="myinput large"> Accesorios de cocina
                                        </div>
                                        <div class="col-lg-4 content-check-input">
                                            <input type="checkbox" name="Acc. de placard" id="8"
                                                value="Acc. de placard" class="myinput large"> Acc. de placard
                                        </div>
                                        <div class="col-lg-4 content-check-input">
                                            <input type="checkbox" name="Acc. para muebles de ofic." id="9"
                                                value="Acc. para muebles de ofic." class="myinput large"> Acc. para
                                            muebles de ofic.
                                        </div>
                                    </div>
                                    <div class="row filas-checkbox">
                                        <div class="col-lg-4 content-check-input">
                                            <input type="checkbox" name="Corredizos" id="10" value="Corredizos"
                                                class="myinput large"> Corredizos
                                        </div>
                                        <div class="col-lg-4 content-check-input">
                                            <input type="checkbox" name="Aluminio" id="11" value="Aluminio"
                                                class="myinput large">
                                            Aluminio
                                        </div>
                                        <div class="col-lg-4 content-check-input">
                                            <input type="checkbox" name="Herramientas" id="12"
                                                value="Herramientas" class="myinput large"> Herramientas
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <label class="label-forms">¿Tuvo algún inconveniente con los productos EUROHARD? <span
                                    class="requerido">*</span></label>
                            <div class="check-content" id="sectionFormProblemas">
                                <div class="check-individual">
                                    <div class="row">
                                        <div class="col-lg-4 content-check-input">
                                            <input type="checkbox" name="Si" id="Si" value="1"
                                                class="only-one myinput large"> Si
                                        </div>
                                        <div class="col-lg-4 content-check-input">
                                            <input type="checkbox" name="No" id="No" value="2"
                                                class="only-one myinput large"> No
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <textarea class="form-control contact-content" id="Inconvenientes" rows="8" aria-label="Inconvenientes"></textarea>

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

                            (function() {
                                const form = document.querySelector('#sectionFormFamilia');
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

                            (function() {
                                const form = document.querySelector('#sectionFormProblemas');
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
