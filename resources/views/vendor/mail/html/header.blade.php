@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) == 'EUROHARD')
    <img src="https://res.cloudinary.com/dmc2c6qwu/image/upload/v1742149250/pruebas/cms64kuf4ug6egcgvxqh.png" class="logo" alt="eurohard Logo">
@else
    {{ $slot }}
@endif
</a>
</td>
</tr>
