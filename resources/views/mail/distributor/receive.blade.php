<x-mail::message>
# Nueva solicitud Formulario de Distribuidores
## Datos recibidos por medio del formulario de distribuidores del sitio web
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
</x-mail::panel>
## Productos que comercializa:
<x-mail::panel>
<ol>
@foreach ($contact['products'] as $product)
<li>{{ Str::ucfirst($product) }}</li>
@endforeach
</ol>
</x-mail::panel>
<x-mail::panel>
Mensaje / Comentario:
{{ $contact['inconvenient_description'] ?? 'Sin comentarios' }}
</x-mail::panel>
<br>
Ir al sitio: <a href="{{config('app.url')}}" target="_blank">EUROHARD</a> 
</x-mail::message>

