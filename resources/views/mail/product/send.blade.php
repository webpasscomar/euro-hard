<x-mail::message>
# Hola {{ Str::title($fullName) }}

## Gracias por contactarnos.
<br>
Recibimos tu solicitud, a la brevedad nos pondremos en contacto.
<br>
<br>

<x-mail::button :url="config('app.url')">
    Ir al sitio
</x-mail::button>

</x-mail::message>
