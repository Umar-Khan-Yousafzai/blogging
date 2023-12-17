<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Include script -->
    <script type="text/javascript">
        function callbackThen(response) {

            // read Promise object
            response.json().then(function(data) {
                console.log(data);
                if (data.success && data.score >= 0.6) {
                    console.log('valid recaptcha');
                } else {
                    document.getElementById('contactForm').addEventListener('submit', function(event) {
                        event.preventDefault();
                        alert('recaptcha error');
                    });
                }
            });
        }

        function callbackCatch(error) {
            console.error('Error:', error)
        }
    </script>

    {!! htmlScriptTagJsApi([
        'callback_then' => 'callbackThen',
        'callback_catch' => 'callbackCatch',
    ]) !!}
</head>

<body class="px-3 md:px-10 lg:px-20">

    @include('frontend.includes.header')

    <main class="pb-20 sm:pb-10">
        <div class="block text-center md:text-start md:flex">
            <div class="bgImg w-[22%] rounded-lg">
            </div>
            <div class="md:w-[70%] md:px-10">
                <div class=" lg:py-10 lg:px-20">
                    <div>
                        <p class="text-xl font-bold sm:text-3xl sm:text-left md:text-3xl lg:text-5xl">Contact Us</p>
                    </div>
                    <div>
                        <form method="POST" action="{{ route('submit-contact-us') }}">
                            @csrf
                            <div>
                                <input class="w-full px-4 py-4 my-4 bg-[#efeef0] outline-none rounded-[2rem] "
                                    type="text" name="name" id="name" required placeholder="Your Name"
                                    minlength="2" maxlength="255">
                                @error('name')
                                    <br> <label style="color:red">{{ $message }}</label>
                                @enderror
                            </div>
                            <div>
                                <input class="w-full px-4 py-4 my-4 bg-[#efeef0] outline-none rounded-[2rem] "
                                    type="email" name="email" id="email" required
                                    placeholder="Your email address">
                                @error('email')
                                    <br> <label style="color:red">{{ $message }}</label>
                                @enderror
                            </div>
                            <div>
                                <textarea placeholder="Your Message" class=" w-full px-4 py-4 my-4 bg-[#efeef0] outline-none rounded-[2rem] "
                                    name="message" id="message" cols="30" rows="4" required minlength="10"></textarea>
                                @error('message')
                                    <br> <label style="color:red">{{ $message }}</label>
                                @enderror
                            </div>
                            <div>
                                <br>
                                <button
                                    class="text-white w-3/4 sm:w-[30%] sm:float-left md:w-[30%] bg-black hover:bg-[#314bff] focus:ring-4 transition font-medium rounded-[2rem] text-sm lg:text-xl px-5 py-2.5"
                                    type="submit">Send Message</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>

        </div>
    </main>

    @include('frontend.includes.footer')

    <script src="https://unpkg.com/@themesberg/flowbite@latest/dist/flowbite.bundle.js"></script>
</body>
