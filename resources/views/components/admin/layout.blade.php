<!DOCTYPE html>
<html lang="en">
<head>
    <x-admin.head title="{{$title}}">
    </x-admin.head>
    <x-admin.styles>
        {{ $style ?? '' }}
    </x-admin.styles>
</head>
<body>
<div id="wrapper">
    <x-admin.header heading="{{$heading ?? 'Dashboard'}}"></x-admin.header>
    <x-admin.sidebar></x-admin.sidebar>
    <div class="content-page">
        <div id="app">
            {{$slot}}
        </div>
        <x-admin.footer></x-admin.footer>
    </div>
</div>
<x-admin.scripts>
    {{ $script ?? '' }}
</x-admin.scripts>
</body>
</html>
