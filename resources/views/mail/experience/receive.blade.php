<x-mail::message>
# Nueva solicitud Formulario de Experiencia
## Datos recibidos por medio del formulario de experiencia del sitio web
<br>
<x-mail::panel>
- **Nombre:** {{ Str::title($contact['fullName']) }} 
<br>
- **Teléfono:** {{ $contact['phone'] }}
<br> 
- **Correo:** {{ $contact['email'] }} 
<br>
- **Tipo de cliente:** {{ Str::ucfirst($contact['client']) }} 
</x-mail::panel>
<br>
Ir al sitio: <a href="{{config('app.url')}}" target="_blank">EUROHARD</a> 
</x-mail::message>
