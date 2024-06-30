<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Théoo{{ $title ? ' • '.$title : '' }}</title>
    @vite(['resources/css/app.scss', 'resources/js/app.js'])

    <noscript>
        <style>
            body.content {
                display: grid;
            }
        </style>
    </noscript>
</head>
<body class="content hidden">
    <h1 class="sro">@lang('commons.title', ['title' => $title])</h1>
    <x-nav/>
    {{ $slot }}
    <x-contact />
</body>
</html>
