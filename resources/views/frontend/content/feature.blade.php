<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <!-- Include script -->
    {{-- <script type="text/javascript">
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
    ]) !!} --}}
</head>

@include('frontend.includes.header')

<body class="px-3 md:px-10 lg:px-20">


    <main>
        {{-- HERE Starts THE FEATURED POSTS SECTION   --}}
        <div class="py-20 section-1 sm:py-10">
            <div class="pb-20 text-center sm:pb-10">
                <h2 class="text-xl font-bold text-center md:text-2xl lg:text-6xl">Featured Posts</h2>
            </div>
            <div id="thumbnail-slider" class="mb-12 -mx-2 lg:mb-6 nav-inset-button carousel"
                data-flickity='{ "cellAlign": "left", "wrapAround": true, "draggable": false, "adaptiveHeight": true, "prevNextButtons": true , "imagesLoaded": true }'>
                @foreach ($featured as $blog)
                    <div class="md:w-[30%] md:mr-10 mb-8 ">
                        <div class="flex flex-col ">
                            <div class="relative">
                                <img class="md:h-[407px] h-[300px] w-full md:w-[339px] rounded-2xl"
                                    src="{{ asset('images/blogs/' . $blog->image) }}" alt="">
                                <div class="absolute bottom-2 left-2">
                                    <div class="w-8 h-8 ">
                                        <img class="h-full  rounded-[1rem] w-full"
                                            src="{{ asset('images/blogs/' . $blog->author_image) }}" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="flex my-3 w-[40%] gap-3">
                                <div>
                                    <a class="bg-[#efeef0] rounded-[1rem] py-1 px-3" href="#">Dehvvjgsign</a>
                                </div>
                                <div>
                                    <a class="bg-[#efeef0] rounded-[1rem] py-1 px-3" href="#">Idea</a>
                                </div>
                                <div>
                                    <a class="bg-[#efeef0] rounded-[1rem] py-1 px-3" href="#">Review</a>
                                </div>
                            </div>
                            <div>
                                <a class="text-black font-bold text-[29px] hover:underline"
                                    href="{{ url('blogs/' . $blog->slug) }}">
                                    {{ $blog->title }}
                                </a>
                                <p> {!! substr(strip_tags($blog->content), 0, 150) !!}</p>
                            </div>
                        </div>

                    </div>
                @endforeach


            </div>
        </div>
        {{-- HERE ENDS THE FEATURED POSTS SECTION   --}}



        {{-- HERE Starts The POPULAR POSTS   --}}
        <div class="py-10 section-1">
            <div class="pb-20 text-center">
                <h2 class="text-xl font-bold text-center md:text-2xl lg:text-6xl">Popular Posts</h2>
            </div>
            <div id="thumbnail-slider" class="mb-12 -mx-2 lg:mb-6 nav-inset-button carousel"
                data-flickity='{ "cellAlign": "left", "wrapAround": true, "draggable": false, "adaptiveHeight": true, "prevNextButtons": true , "imagesLoaded": true }'>
                @foreach ($trending as $blog)
                    <div class="md:w-[30%] md:mr-10 mb-8 ">
                        <div class="flex flex-col ">
                            <div class="relative">
                                <img class="md:h-[407px] h-[300px] w-full md:w-[339px] rounded-2xl"
                                    src="{{ asset('images/blogs/' . $blog->image) }}" alt="">
                                <div class="absolute bottom-2 left-2">
                                    <div class="w-8 h-8 ">
                                        <img class="h-full  rounded-[1rem] w-full"
                                            src="{{ asset('images/blogs/' . $blog->author_image) }}" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="flex my-3 w-[40%] gap-3">
                                <div>
                                    <a class="bg-[#efeef0] rounded-[1rem] py-1 px-3" href="#">Dehvvjgsign</a>
                                </div>
                                <div>
                                    <a class="bg-[#efeef0] rounded-[1rem] py-1 px-3" href="#">Idea</a>
                                </div>
                                <div>
                                    <a class="bg-[#efeef0] rounded-[1rem] py-1 px-3" href="#">Review</a>
                                </div>
                            </div>
                            <div>
                                <a class="text-black font-bold text-[29px] hover:underline"
                                    href="{{ url('blogs/' . $blog->slug) }}">
                                    {{ $blog->title }}
                                </a>
                                <p> {!! substr(strip_tags($blog->content), 0, 150) !!}</p>
                            </div>
                        </div>

                    </div>
                @endforeach


            </div>
        </div>
        {{-- HERE ENDS The POPULAR POSTS   --}}

        {{-- HERE Starts The RECENT POSTS   --}}
        <div class="py-10 section-1">
            <div class="pb-20 text-center">
                <h2 class="text-xl font-bold text-center md:text-2xl lg:text-6xl">Recent Posts</h2>
            </div>
            <div id="thumbnail-slider" class="mb-12 -mx-2 lg:mb-6 nav-inset-button carousel"
                data-flickity='{ "cellAlign": "left", "wrapAround": true, "draggable": false, "adaptiveHeight": true, "prevNextButtons": true , "imagesLoaded": true }'>
                @foreach ($recommended as $blog)
                    <div class="md:w-[30%] md:mr-10 mb-8 ">
                        <div class="flex flex-col ">
                            <div class="relative">
                                <img class="md:h-[407px] h-[300px] w-full md:w-[339px] rounded-2xl"
                                    src="{{ asset('images/blogs/' . $blog->image) }}" alt="">
                                <div class="absolute bottom-2 left-2">
                                    <div class="w-8 h-8 ">
                                        <img class="h-full  rounded-[1rem] w-full"
                                            src="{{ asset('images/blogs/' . $blog->author_image) }}" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="flex my-3 w-[40%] gap-3">
                                <div>
                                    <a class="bg-[#efeef0] rounded-[1rem] py-1 px-3" href="#">Dehvvjgsign</a>
                                </div>
                                <div>
                                    <a class="bg-[#efeef0] rounded-[1rem] py-1 px-3" href="#">Idea</a>
                                </div>
                                <div>
                                    <a class="bg-[#efeef0] rounded-[1rem] py-1 px-3" href="#">Review</a>
                                </div>
                            </div>
                            <div>
                                <a class="text-black font-bold text-[29px] hover:underline"
                                    href="{{ url('blogs/' . $blog->slug) }}">
                                    {{ $blog->title }}
                                </a>
                                <p> {!! substr(strip_tags($blog->content), 0, 150) !!}</p>
                            </div>
                        </div>

                    </div>
                @endforeach

            </div>
        </div>
        {{-- HERE Ends The RECENT POSTS   --}}

        <div class=" sm:text-center sm:mb-3 md:flex justify-between py-10 border-b border[#ceced0]">
            <div class="">
                <p class="text-xl md:text-3xl lg:text-[4rem]">
                    Subscribe to
                    <span class="font-bold">new posts</span>
                </p>
            </div>
            <div class="md:w-[35%] rounded-[2rem]">
                <form method="POST" action="{{ route('submit-news-letter') }}">
                    @csrf
                    <div class="flex items-center rounded-3xl F">
                        <div class="flex w-full">
                            <input
                                class="block outline-none px-[20px] py-5 -mr-[60px] rounded-[3rem] w-full text-sm text-gray-900 bg-gray-50 placeholder:text-base md:placeholder:text-base lg:placeholder:text-2xl placeholder:text-black  "
                                placeholder="Enter your email" name="email" type="email" id="email"
                                required>
                            <div class="h-full sm:w-1/2  rounded-[1rem] ">
                                <button type="submit"
                                    class=" focus:outline-none active::outline-none rounded-[3rem] py-5 px-7 w-full text-sm md:text-base lg:text-2xl font-medium text-center text-white bg-[#151618]">Subscribe</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </main>

    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    <script src="https://unpkg.com/@themesberg/flowbite@latest/dist/flowbite.bundle.js"></script>
    @include('frontend.includes.footer')

</body>

</html>
