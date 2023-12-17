@extends('frontend.layout')

@section('content')
    <main class="py-2 md:py-5 lg:py-10 ">
        <div class="block m-auto">
            <h1 class="text-2xl text-center md:text-4xl lg:text-8xl md:text-left ">
                <span class="font-bold">Blogging.</span> Health is Wealth! Stay Healthy
            </h1>
        </div>
        <div class="py-2 md:flex gap-5 border-b border-[#ceced0] ">
        </div>
        <div>
            <div class="flex justify-between py-5">

                <div class="hidden gap-4">
                    <div>
                        <button class="flickity-button flickity-prev-next-button next" type="button" aria-label="Next">
                            <svg width="20px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M8.775 3.225 0 12l8.775 8.775 1.498-1.407-6.421-6.267H24v-2.202H3.852l6.421-6.267-1.498-1.407Z">
                                </path>
                            </svg>

                        </button>
                    </div>
                    <div>
                        <button>
                            <svg width="20px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M15.225 20.775 24 12l-8.775-8.775-1.498 1.407 6.421 6.267H0v2.202h20.148l-6.421 6.267 1.498 1.407Z">
                                </path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <div class="justify-between pt-5 md:flex">
                <div class="md:w-[50%]">
                    @if (count($blogs) == 0)
                        <p class="text-5xl">
                            Uh-Oh No Record Found!
                            {{-- <span class="font-bold">written for your wellbeing</span> --}}
                        </p>
                    @else
                        <p class="text-5xl">
                            Take a moment and read what we've
                            <span class="font-bold">written for your wellbeing</span>
                        </p>
                    @endif

                </div>

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
                            <div class="flex my-3 w-[50%] gap-3" id="tags-container">
                                @php
                                    if ($blog->tags) {
                                        $tags = explode(',', $blog->tags);
                                    }
                                @endphp
                                @if (isset($tags))
                                    @foreach ($tags as $tag)
                                        <div>
                                            <a style="white-space: nowrap;" id="personalTag"
                                                class="tag personalTag bg-[#efeef0] rounded-[1rem] py-1 px-3 flex-wrap"
                                                data-tag="{{ $tag }}">{{ $tag }}</a>
                                            @php
                                                $tagValue = $tag;
                                            @endphp
                                        </div>
                                    @endforeach
                                @endif
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
            <div class="flex justify-center">
                {{ $blogs->onEachSide(1)->links() }}
            </div>
    </main>
@endsection
