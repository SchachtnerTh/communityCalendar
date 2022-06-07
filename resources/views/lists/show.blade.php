<!--
<!doctype html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    </head>

    <body class="flex flex-col h-screen ">
        <iframe class="w-full h-full " src="https://events.th-schachtner.de/index.php/apps/calendar/p/{{ $calsList }}/dayGridMonth/now"></iframe>
    </body>
</html>
-->
<x-mylayout>
    <div class="flex w-full h-full">
        <iframe class="w-full h-full" src="{{ env('CALENDAR_URL') }}{{ $calsList }}/dayGridMonth/now"></iframe>
    </div>
</x-mylayout>
