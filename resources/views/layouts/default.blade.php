<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>First Laravel Mini Project</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
        <script src="https://use.fontawesome.com/b494c279b5.js"></script>
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
        <link
            rel="stylesheet"
            href="https://use.fontawesome.com/releases/v5.0.8/css/all.css"
        />
        <script
            src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
            defer
        ></script>
        <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;600&display=swap" rel="stylesheet">
    <script src="https://www.google.com/recaptcha/api.js?onload=vueRecaptchaApiLoaded&render=explicit" async defer>
    </script>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}" />
    </head>
    <body class="bg-blue-100">
        <div id="app">
            <app>
            <h1
                class="p-5 mx-auto text-center text-blue-900 font-bold text-2xl"
            >
                Welcome to my First Laravel Mini Project!
            </h1>

            <div class="p-2 container mx-auto">
                
                    <a
                        class="
                        
                        justify-center
                            flex
                            max-w-xs
                            mx-auto
                            bg-blue-400
                            border-blue-800
                            px-4
                            py-1
                            rounded-xl
                        "
                        href="/table"
                    >
                        Click Here to Add an OJT Activity
                    </a>
                </div>
            </div>
        </main>
    </app>
</div>
<script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
