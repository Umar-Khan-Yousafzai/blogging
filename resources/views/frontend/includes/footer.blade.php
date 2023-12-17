    <footer>
        <div class="md:flex mx-3 md:mx-10 lg:mx-0  justify-between pb-10">
            <div class="lg:w-1/2 pt-3 md:pr-8">
                <div class=" sm:block sm:m-auto ">

                        <a href="{{route('home')}}">

                            <img width="160" height="1" src="{{asset('assets/logo.png')}}" alt="logo" >
                        </a>

                </div>
                <div>
                    <p class="text-left font-semibold w-3/4">A Secret To Leading A Comfortable and Healthy Life.
                        Stay Healthy - Stay Happy.</p>
                </div>
            </div>

            <div class="sm:ml-2 md:w-1/5 pt-3">
                <p class="md:text-left font-bold text-lg">Quick Links</p>
                <ul>
                    <li class=" md:justify-start py-2 flex gap-2 items-center">
                        <div>
                            <a href="{{route('home')}}">
                                <p class="font-normal text-base">Home</p>
                            </a>
                        </div>
                    </li>
                    <li class="  md:justify-start flex py-2 gap-2 items-center">
                        <div>
                            <div>
                                <a href="{{route('about-us')}}">
                                    <p class="font-normal text-base">About Us</p>
                                </a>
                            </div>
                    </li>
                    <li class="  md:justify-start flex py-2 gap-2 items-center">
                        <a href="{{route('privacy-policy')}}">
                            <p class="font-normal text-base">Privacy Policy</p>
                        </a>
                    </li>

                    <li class="  md:justify-start flex py-2 gap-2 items-center">
                        <a href="{{route('contact-us')}}">
                            <p class="font-normal text-base">Contact</p>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="md:w-1/5 pt-3">
                <p class="md:text-left font-bold text-lg">Quick Links</p>
                <ul>
    {{--
                    <li class="  md:justify-start flex py-2 gap-2 items-center">
                        <div>
                            <div>
                                <a href="#">
                                    <p class="font-normal text-base">Weight lose</p>
                                </a>
                            </div>
                    </li> --}}
                    @php
                    $categories = navbarCategories();
                @endphp
                    @foreach ($categories as $category )
                    <li class="  md:justify-start flex py-2 gap-2 items-center">
                        <a href="{{ route('category.page', ['key' => $category->key]) }}">
                            <p class="font-normal text-base">{{$category->category}}</p></a>
                    </li>
                    @endforeach
                    {{-- <li class="  md:justify-start flex py-2 gap-2 items-center">
                        <a href="#">
                            <p class="font-normal text-base">Mental Health</p>
                        </a>
                    </li>
                    <li class="  md:justify-start flex py-2 gap-2 items-center">
                        <a href="#">
                            <p class="font-normal text-base">Healthy tips</p>
                        </a>
                    </li> --}}
                </ul>
            </div>
            <div class="sm:w-full md:w-1/5 pt-3">
                <p class="font-bold text-lg md:text-left">Connect With Us</p>
                <ul>
                    <li class="  md:justify-start py-2 flex gap-2 items-center">
                        <div>
                            <svg width="20px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M23.9981 11.9991C23.9981 5.37216 18.626 0 11.9991 0C5.37216 0 0 5.37216 0 11.9991C0 17.9882 4.38789 22.9522 10.1242 23.8524V15.4676H7.07758V11.9991H10.1242V9.35553C10.1242 6.34826 11.9156 4.68714 14.6564 4.68714C15.9692 4.68714 17.3424 4.92149 17.3424 4.92149V7.87439H15.8294C14.3388 7.87439 13.8739 8.79933 13.8739 9.74824V11.9991H17.2018L16.6698 15.4676H13.8739V23.8524C19.6103 22.9522 23.9981 17.9882 23.9981 11.9991Z">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <a href="https://www.facebook.com/people/Get-Healthy-Benefits/100091627756840/" target="_blank">
                                <p class="font-normal text-base">Facebook</p>
                            </a>
                        </div>
                    </li>
                    <li class="flex   md:justify-start py-2 gap-2 items-center">
                        <div>
                            <svg width="20px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M23.954 4.569c-.885.389-1.83.654-2.825.775 1.014-.611 1.794-1.574 2.163-2.723-.951.555-2.005.959-3.127 1.184-.896-.959-2.173-1.559-3.591-1.559-2.717 0-4.92 2.203-4.92 4.917 0 .39.045.765.127 1.124C7.691 8.094 4.066 6.13 1.64 3.161c-.427.722-.666 1.561-.666 2.475 0 1.71.87 3.213 2.188 4.096-.807-.026-1.566-.248-2.228-.616v.061c0 2.385 1.693 4.374 3.946 4.827-.413.111-.849.171-1.296.171-.314 0-.615-.03-.916-.086.631 1.953 2.445 3.377 4.604 3.417-1.68 1.319-3.809 2.105-6.102 2.105-.39 0-.779-.023-1.17-.067 2.189 1.394 4.768 2.209 7.557 2.209 9.054 0 13.999-7.496 13.999-13.986 0-.209 0-.42-.015-.63.961-.689 1.8-1.56 2.46-2.548l-.047-.02z">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <a href="https://twitter.com/gethealthybene" target="_blank">
                                <p class="font-normal text-base">Twitter</p>
                            </a>
                        </div>
                    </li>
                    <li class="flex   md:justify-start py-2 gap-2 items-center">
                        <div>
                            {{-- <svg width="20px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M7.168 0c-3.2 0-5.797 2.579-5.797 5.758v12.484C1.371 21.42 3.968 24 7.168 24c1.981 0 3.716-.978 4.768-2.479l.794.79c2.26 2.245 5.943 2.245 8.203 0a5.724 5.724 0 001.696-4.075 5.724 5.724 0 00-1.696-4.074l-2.182-2.168 2.182-2.156a5.724 5.724 0 001.696-4.074 5.724 5.724 0 00-1.696-4.074c-2.26-2.246-5.942-2.246-8.203 0l-.794.789A5.797 5.797 0 007.168 0Z">
                                </path>
                            </svg> --}}

                            <?xml version="1.0"?>
                            <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 50 50" width="25px" height="25px">
                                <path d="M41,4H9C6.24,4,4,6.24,4,9v32c0,2.76,2.24,5,5,5h32c2.76,0,5-2.24,5-5V9C46,6.24,43.76,4,41,4z M17,20v19h-6V20H17z M11,14.47c0-1.4,1.2-2.47,3-2.47s2.93,1.07,3,2.47c0,1.4-1.12,2.53-3,2.53C12.2,17,11,15.87,11,14.47z M39,39h-6c0,0,0-9.26,0-10 c0-2-1-4-3.5-4.04h-0.08C27,24.96,26,27.02,26,29c0,0.91,0,10,0,10h-6V20h6v2.56c0,0,1.93-2.56,5.81-2.56 c3.97,0,7.19,2.73,7.19,8.26V39z"/>
                            </svg>
                        </div>
                        <div>
                            <a href="https://www.linkedin.com/company/gethealthybenefits-com/" target="_blank">
                                <p class="font-normal text-base">LinkedIn</p>
                            </a>
                        </div>
                    </li>
                    {{-- <li class="flex  md:justify-start py-2 gap-2 items-center">
                        <div>
                            <svg width="20px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M23.977 6.416c-.105 2.338-1.739 5.543-4.894 9.609-3.268 4.247-6.026 6.37-8.29 6.37-1.409 0-2.578-1.294-3.553-3.881L5.322 11.4C4.603 8.816 3.834 7.522 3.01 7.522c-.179 0-.806.378-1.881 1.132L0 7.197c1.185-1.044 2.351-2.084 3.501-3.128C5.08 2.701 6.266 1.984 7.055 1.91c1.867-.18 3.016 1.1 3.447 3.838.465 2.953.789 4.789.971 5.507.539 2.45 1.131 3.674 1.776 3.674.502 0 1.256-.796 2.265-2.385 1.004-1.589 1.54-2.797 1.612-3.628.144-1.371-.395-2.061-1.614-2.061-.574 0-1.167.121-1.777.391 1.186-3.868 3.434-5.757 6.762-5.637 2.473.06 3.628 1.664 3.493 4.797l-.013.01z">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <a href="#">
                                <p class="font-normal text-base">Vimeo</p>
                            </a>
                        </div>
                    </li> --}}
                </ul>
            </div>

        </div>
        <div class="py-2 ">
            <p class="text-center">
                © Blogging 2023. All rights reserved.
            </p>
        </div>
    </footer>
