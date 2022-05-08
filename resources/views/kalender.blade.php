<!doctype html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet"> 
    </head>

    <body class="flex flex-col h-screen ">
        <div id="header" class="flex h-24 bg-gray-200 text-3xl justify-center items-center m-4 mb-0 rounded">
            Test
        </div>
        <div class="h-full w-full p-4">
            <div id="content" class="flex w-full h-full bg-pink-200">
                <div id="navigation" class="w-80 m-2 bg-pink-300">
                    <ul>
                        <li class="h-8 p-2 pl-4 bg-green-300 m-2 rounded-full items-center flex">Kalender 1</li>
                        <li class="h-8 p-2 pl-4 bg-green-300 m-2 rounded-full items-center flex">Kalender 2</li>
                        <li class="h-8 p-2 pl-4 bg-green-300 m-2 rounded-full items-center flex">Kalender 3</li>
                        <li class="h-8 p-2 pl-4 bg-green-300 m-2 rounded-full items-center flex">Kalender 4</li>
                        <li class="h-8 p-2 pl-4 bg-green-300 m-2 rounded-full items-center flex">Kalender 5</li>
                        <li class="h-8 p-2 pl-4 bg-green-300 m-2 rounded-full items-center flex">Kalender 6</li>
                        <li class="h-8 p-2 pl-4 bg-green-300 m-2 rounded-full items-center flex">Kalender 7</li>
                        <li class="h-8 p-2 pl-4 bg-green-300 m-2 rounded-full items-center flex">Kalender 8</li>
                    </ul>
                </div>
                <div id="navigation" class="flex flex-col w-full m-2 ml-0">
                    <!--<iframe class="w-full h-full " src="https://events.th-schachtner.de/index.php/apps/calendar/embed/Sn3yEarTc7g24qmA-7stZLnABF58RN3dJ-LqiEDgY57zCwRjfD-TRmxH8KKsaEMmnzX-CHPwABzT7EdmqsTL-b6CZRADBdWY3gmna"></iframe> -->
                    <iframe class="w-full h-full " src="https://events.th-schachtner.de/index.php/apps/calendar/embed/Sn3yEarTc7g24qmA-7stZLnABF58RN3dJ-LqiEDgY57zCwRjfD-TRmxH8KKsaEMmnzX-CHPwABzT7EdmqsTL"></iframe>
                </div>
            </div>
        </div>
    </body>
</html>