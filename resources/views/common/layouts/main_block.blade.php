<!doctype html>
<html lang="ru">
<head>

    {{-- include --}}
    @include('common.partials.include')
    {{-- блок со стилями --}}
    @yield('styles')

</head>

<body>

<div class="wrapper">

    {{-- шапка --}}
    <div class="header_block">
        @include('common.partials.header')
    </div>

    {{-- основное меню сайта --}}
    <div class="main_menu">
        @include('common.partials.main_menu')
    </div>

    {{-- контент страницы --}}
    <div class="content">
        @yield('content')
    </div>

    <!-- футер-->
    <footer class="main_footer">
        {{-- футер --}}
        @include('common.partials.footer')
    </footer>

</div>

{{-- Скрипт в конце страницы сайта --}}
@include('common.partials.end_page_script')
{{-- Скрипты --}}
@yield('scripts')

</body>
</html>
