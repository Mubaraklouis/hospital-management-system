<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title inertia>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />


        <!-- Scripts -->
        @routes
        @vite(['resources/js/app.ts', "resources/js/Pages/{$page['component']}.vue"])
        @inertiaHead
    </head>
    <body class="font-sans antialiased">

    </body>
    <style>
        :root {
            /* font-weight: 1.5rem; */
            --font-size: 1.3rem;
            /* creating the overall margin
            top rigth botton left */
            --MainMargins:1.7rem 1.7rem 1.7rem;
            --MainPaddings:0rem 1.7rem 1.7rem;
            --color:#000;
            --background-color: #E3E1FC;
            --secondaryColor:#6200FF;
            --secondaryTextColor:#7D7474;
            --borderColor:#c1b6b6;
            --background-two:rgb(197, 194, 227);

            font-synthesis: none;
            text-rendering: optimizeLegibility;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            -webkit-text-size-adjust: 100%;
        }

        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        #body{
            font-family: 'Inter', sans-serif;
            font-family: 'Roboto', sans-serif;
            line-height: 1.5;
            /* padding: var(--MainMargins); */
            font-size:var(--font-size);
            background:var(--background-color);
        }
        /* titles style */
        .title-one{
            font-size: 15px;
            font-weight: 700;
        }

        /* all the styles for the logo will be here */
        .logo-container{
            width:100px;
        }

        /* all the styles for the main body page will be here */
        .body-paddings{
            padding: var(--MainPaddings);
        }
        /* navbar styles  */
        nav{
            padding: var(--MainMargins);
        }

        /* mini navbar for dashboard reports and the in and out products */
        .indicator-bar{
            height: 4px;
            border-radius: 5px;
            background-color:var(--secondaryColor) ;
            margin-top: 0.2rem;
            opacity: 0;
            cursor: pointer;
        }

        .indicator-bar-dashboard{
            height: 4px;
            border-radius: 5px;
            background-color:var(--secondaryColor) ;
            margin-top: 0.2rem;
            opacity: 1;
            cursor: pointer;
        }
        .indicator-bar:hover{
            height: 4px;
            border-radius: 5px;
            background-color:var(--secondaryColor) ;
            margin-top: 0.2rem;
            opacity: 0;
            cursor: pointer;
            opacity: 1;
            transition: 400ms all ease-in-out;
        }


        /* secondar text color style here */
        .secondary-text{
            color: var(--secondaryTextColor);
        }

        /* all the styles belonging to user */
        .user-border{
            border: 3px solid var(--secondaryColor);
        }
        .rounded-border{
            border: 0.4px solid var(--borderColor);
            border-radius: 10px;
            padding: 10px;
            background: var(--background-two);


        }
        .nav-border{
            border: 0.1px solid var(--borderColor);
            /* border-radius: 10px; */
        }
        .mini-nav-border{
            border-bottom: 0.1px solid var(--borderColor);
            /* border-radius: 10px; */
        }

        /* filter,search and the calender section */
        .calender-input{
            width: 150px;
            height: 50px;
            border: 1px solid var(--borderColor);
            border-radius: 15px;
            box-shadow: 5px 5px 5px 2px rgba(0, 0, 0, 0.08);
            background-color: var(--background-color);
        }


        /* styles for in product form */
        .in-product-form{
            width: 350px;
            background-color: white;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 5px 5px 5px 2px rgba(0, 0, 0, 0.08);


        }
        .in-product-form input{
            background-color: var(--background-color);
            border: 1px solid var(--secondaryColor);
            border-radius: 10px;
        }

        .in-product-form label{
            margin-top:10px;
            margin-bottom: 10px;

        }

        .btn-component{
            background-color: var(--secondaryColor);
            border-radius: 15px;
            color: white;
            padding: 6px;
            margin-top: 15px;
            margin-bottom: 10px;
        }
        body{

            background-color: #E3E1FC;
        }



    </style>
        @inertia

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    </body>
</html>
