@extends('adminlte::page')

{{-- Extend and customize the browser title --}}

@section('title')
    {{ config('adminlte.title') }}
    @hasSection('subtitle')
        | @yield('subtitle')
    @endif
@stop

{{-- Extend and customize the page content header --}}

@section('content_header')
    @hasSection('content_header_title')
        <h1 class="text-muted py-3">
            @yield('content_header_title')

            @hasSection('content_header_subtitle')
                <small class="text-dark">
                    <i class="fas fa-xs fa-angle-right text-muted"></i>
                    @yield('content_header_subtitle')
                </small>
                @hasSection('content_header_detail')
                    <small class="text-gray-500">
                        <i class="fas fa-xs fa-angle-right text-muted"></i>
                        @yield('content_header_detail')
                    </small>
                @endif
            @endif
        </h1>
    @endif
@stop

{{-- Rename section content to content_body --}}

@section('content')
    @yield('content_body')
    @include('sweetalert::alert')
@stop

{{-- Create a common footer --}}

@section('footer')
    <div class="float-right">
        Version: {{ config('app.version', '1.0.1') }}
    </div>

    <strong>
        <a href="{{ config('app.company_url', '#') }}" target="_blank" class="text-decoration-none">
            {{ \Illuminate\Support\Str::title(config('app.company_name', 'Webpass')) }}
        </a>
    </strong>
@stop

{{-- Add common Javascript/Jquery code --}}

@push('js')
    <script>
        $(document).ready(function() {
            $('#adminTable').DataTable({
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/2.2.1/i18n/es-MX.json',
                },
                stateSave: true
            });
        });
    </script>
@endpush

{{-- Add common CSS customizations --}}

@push('css')
    <link rel="stylesheet" href="https://fonts.bunny.net/css?family=Nunito" />
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/44.1.0/ckeditor5.css" />
    <style type="text/css">
    </style>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
@endpush
