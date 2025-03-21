<x-mail::message>
# Nueva solicitud Formulario de Productos
## Datos recibidos por medio del formulario de productos del sitio web
<br>
<x-mail::panel>
- **Nombre:** {{ Str::title($contact['fullName']) }} 
<br>
- **Teléfono:** {{ $contact['phone'] }}
<br> 
- **Correo:** {{ $contact['email'] }} 
<br>
- **Tipo de cliente:** {{ Str::ucfirst($contact['client']) }}
<br>
- **Provincia que comercializa los productos:** {{ Str::title($contact['province']) }}
<br>
- **Usuario:** {{ $contact['user'] }}
<br>
- **Razón de la consulta:** {{ Str::ucfirst($contact['client']) }}
<br>
- **Código del producto a consultar:** {{ $contact['cod_product'] }}
<br>
- **Nombre del producto a consultar:** {{ $contact['name_product'] }}
</x-mail::panel>
## Consulta:
<x-mail::panel>
{{ Str::ucfirst($contact['consultation'])}}
</x-mail::panel>
<br>
Ir al sitio: <a href="{{config('app.url')}}" target="_blank">EUROHARD</a> 
</x-mail::message>

