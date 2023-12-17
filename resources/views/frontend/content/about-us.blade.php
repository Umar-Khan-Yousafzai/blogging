<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About us</title>

    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="px-3 md:px-10 lg:px-20">
    @include('frontend.includes.header')
    <main class="py-10">
        <div class="">
            <h1 class="py-4 text-2xl text-center md:text-4xl lg:text-4xl md:text-left">About Us</h1>

            <p class="w-3/4 text-justify">Blogging will help you find informative and useful blogs about
                health, beauty, diet, and other topics related to health. We believe that fitness and health are
                important and want to support people who are interested in improving their health and fitness.
                At (Blogging) our writers work hard every day to deliver accurate information to our
                viewers. They are always up to date with the latest news and information.
                Each piece of written content is reviewed by a team of medical professionals.
                We try to include as many blogs and other topics as possible, so there will always be something for
                everyone!
                If you would like to contact us so please email us at (Email address).
                Enjoy a wonderful day ahead.
            </p>
        </div>
    </main>
    @include('frontend.includes.footer')
