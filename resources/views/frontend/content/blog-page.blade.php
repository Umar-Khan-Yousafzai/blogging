@extends('frontend.layout')

@section('content')
    <main class="py-10">
        <div class="flex flex-col md:flex-row">
            <div class="order-2 md:w-3/5 md:order-1">
                <div class="flex gap-3 md:justify-start">
                    @foreach ($blogTags as $tag)
                        <a class="bg-[#efeef0] rounded-[1rem] py-1 px-3" href="#">{{ $tag }}</a>
                    @endforeach

                </div>
                <div class="pt-3 ">
                    <p class="text-xl font-bold text-center sm:text-left md:text-start md:text-3xl lg:text-5xl">
                        {{ $blog->title }}</p>
                </div>
                <div class="pt-3">
                    <p class="text-base text-center md:text-start md:text-lg lg:text-xl sm:text-left">
                        {{ $blog->title_description }}
                    </p>
                </div>
                <div class="flex items-center gap-1 pt-3">
                    <div class="sm:w-[100%] md:w-[60%] flex  md:justify-start">
                        <div class="z-[5] -mr-5 w-[20%] ">
                            <a href="#">
                                <img class="border-4 rounded-[50%] border-white custom"@if (auth()->user()->role == 'author') src={{ auth()->user()->picture ?? asset('assets/admin/dist/img/avatar2.png') }}
                                @else
                                src={{ asset('assets/admin/dist/img/avatar2.png') }} @endif
                                    class="img-circle elevation-2" alt="User Image">
                            </a>
                        </div>
                        <div class="z-[4] self-center  author">
                            <p><span class="">{{ $blog->user->name }}</span>
                                <br>
                                @php
                                    $date = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $blog->created_at);
                                    $formattedDate = $date->format('F d, Y');
                                @endphp
                                {{ $formattedDate }}
                            </p>
                        </div>
                    </div>

                </div>
            </div>
            <div class="order-1 md:w-2/5 md:ml-10 md:order-1">
                <img class="h-[70vh] m-auto rounded-[1rem] w-full" src="{{ asset('images/blogs/' . $blog->image) }}"
                    alt="">
                <p class="py-4">Photo by <b>{{ $blog->user->name }}</b></p>
            </div>

        </div>
        <div class=" py-10 w-[60%] m-auto custom-para">
            <p class="text-base font-normal md:text-lg lg:text-xl ">
                <?= $blog->content ?>
            </p>
        </div>
        <div class="bg-[#151618] p-10 text-center ">
            <p class="text-xl font-bold text-white md:text-3xl lg:text-4xl">{{ $blog->main_tag_line }}</p>
        </div>
        <div class=" w-full py-3 md:w-[60%] m-auto">
            <div class="py-3">
                <p class="text-base md:text-lg lg:text-xl ">
                    <?= $blog->content_2 ?>
                </p>
            </div>


        </div>
        @if (isset($oldBlog))
            <div class=" border-y border[#ceced0] py-5">
                <div class="flex justify-end">
                    <div class="flex items-center gap-3 md:w-1/3">
                        <div class="text-right">
                            <p>Older Posts</p>
                            <a href="{{ url('blogs/' . $oldBlog->slug) }}">
                                <h3 class="text-xl font-semibold">{{ $oldBlog->title }}</h3>
                            </a>
                        </div>
                        <div>
                            <a href="#">
                                <img class="rounded h-[200px]" src="assets/mn1.jpeg" alt="">
                            </a>
                        </div>
                    </div>
                    <div>

                    </div>
                </div>

            </div>
        @endif

        <div class="py-10">
            <p class="mb-4 text-2xl font-bold">Comments</p>

            <!-- Display existing comments -->
            @foreach ($blog->comments as $comment)
                <div class="p-4 mt-2 bg-gray-100 rounded">
                    {{-- <strong class="text-lg">{{ $comment->user->name }}</strong> --}}
                    <p class="text-gray-800">{{ $comment->content }}</p>
                </div>
            @endforeach

            <!-- Add a new comment form -->
            <form action="{{ route('comments.store') }}" method="post" class="mt-8">
                @csrf
                <input type="hidden" name="blog_id" value="{{ $blog->id }}">

                <div class="mb-4">
                    <label for="comment" class="block text-sm font-medium text-gray-600">Add a Comment</label>
                    <textarea name="content" id="comment" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-indigo-500" rows="3" required></textarea>
                </div>

                <button type="submit" class="px-4 py-2 text-white bg-indigo-500 rounded-md hover:bg-indigo-600 focus:outline-none focus:bg-indigo-600">Submit Comment</button>
            </form>
        </div>


        <div class="py-5 md:py-10">
            <p class="font-bold">Recommended</p>
            <div>
                <div class="flex-wrap px-2 py-5 md:flex">
                    @foreach ($blogs as $singleBlog)
                        <a href="{{ url('blogs/' . $singleBlog->slug) }}">
                            <div class="md:w-[19%] mb-8 ">
                                <div class="flex flex-col ">
                                    <div class="relative">
                                        <img class="w-full rounded-2xl"
                                            src="{{ asset('images/blogs/' . $singleBlog->image) }}" alt="">
                                        <div class="absolute bottom-2 left-2">
                                            <div class="w-8 h-8 ">
                                                <img class="h-full rounded-[1rem] w-full"
                                                    src="{{ asset('images/blogs/' . $blog->author_image) }}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <a class="text-2xl font-bold text-black underline"
                                            href="{{ url('blogs/' . $singleBlog->slug) }}">
                                            {{ $singleBlog->title }}
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>



        <div class="sm: text-center sm:mb-3 md:flex justify-between py-10 border-b border[#ceced0]">
            <div class="">
                <p class="text-xl md:text-3xl lg:text-5xl">
                    Subscribe to
                    <span class="font-bold">new posts</span>
                </p>
            </div>
            <div class="md:w-[35%] rounded-[2rem]">
                <form class="" action="#">
                    <div class="flex items-center rounded-3xl F">
                        <div class="relative w-full">
                            <input
                                class="block outline-none p-5 rounded-[2rem] w-full text-sm text-gray-900 bg-gray-50 placeholder:text-2xl placeholder:text-black  "
                                placeholder="Enter your email" type="email" id="email" required="">
                            <div class="md:absolute sm:w-1/2 sm:py-2 right-0 rounded-[1rem] top-[-6px]">
                                <button type="submit"
                                    class=" focus:outline-none active::outline-none rounded-[2rem] py-3 px-5 w-full text-sm md:text-2xl font-medium text-center text-white bg-[#151618]">Subscribe</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </main>
@endsection
