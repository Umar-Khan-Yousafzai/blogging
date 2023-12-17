@extends('frontend.layout')

@section('content')
    <main>
        <div class="py-10 section-1">
            <div class="pb-20 text-center">
                <h2 class="text-xl font-bold text-center md:text-2xl lg:text-6xl">{{ $category->name }}</h2>
            </div>
            <div class="flex-wrap py-5 md:flex">
                @foreach ($blogs as $blog)
                    <div class="md:w-[30%] md:mr-10 mb-8 ">
                        <div class="flex flex-col ">
                            <div class="relative">
                                <img class="md:h-[407px] h-[300px] w-full md:w-[339px] rounded-2xl"
                                    src="{{ asset('images/blogs/' . $blog->image) }}" alt="">
                            </div>
                            <div class="flex flex-wrap w-full gap-3 my-3">
                                <div class="w-full gap-3 my-3">
                                </div>
                            </div>
                            @php
                                if ($blog->tags) {
                                    $tags = explode(',', $blog->tags);
                                }
                            @endphp
                            <div class="flex my-3 w-[50%] gap-3" id="tags-container">
                                @if (isset($tags))
                                    @foreach ($tags as $tag)
                                        <div>
                                            <a href="#" style="white-space: nowrap;" id="personalTag"
                                                class="tag personalTag bg-[#efeef0] rounded-[1rem] py-1 px-3 flex-wrap"
                                                data-tag="{{ $tag }}">{{ $tag }}</a>
                                            @php
                                                $tagValue = $tag;
                                            @endphp
                                        </div>
                                    @endforeach
                                @endif
                                <form id="searchForm" action="{{ route('search') }}" method="get">
                                    <input hidden id="searchInput" value="{{ $tagValue }}"
                                        class="w-40 p-2 mt-1 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500"
                                        type="text" name="query" placeholder="Search">
                                    <button class="ms-3" type="submit">
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                    </button>
                                </form>
                            </div>
                            <div>
                                <a class="text-black font-bold text-[29px] hover:underline"
                                    href="{{ url('blogs/' . $blog->slug) }}">
                                    {{ $blog->title }}
                                </a>
                                <p class="py-3">
                                    {!! substr(strip_tags($blog->content), 0, 150) !!}
                                </p>
                            </div>
                        </div>

                    </div>
                @endforeach

            </div>
        </div>
        {{-- HERE Ends The RECENT POSTS   --}}
        <div class="flex justify-center">
            {{ $blogs->onEachSide(1)->links() }}
        </div>
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
                                placeholder="Enter your email" name="email" type="email" id="email" required>
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
    @push('scripts')
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script>
            $(document).ready(function() {
                $(".personalTag").click(function() {
                    // Submit the form
                    $("#searchForm").submit();
                });
            });
        </script>
    @endpush
@endsection
