<li @isset($item['id']) id="{{ $item['id'] }}" @endisset
    class="nav-header fw-bolder text-white {{ $item['class'] ?? '' }}">

    {{ is_string($item) ? $item : $item['header'] }}

</li>
