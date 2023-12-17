@extends('frontend.layout')

@section('content')
    <div class="flex flex-col items-center justify-center min-h-screen bg-gray-50">
        <div class="w-full max-w-md p-8 bg-white rounded-lg shadow-lg mt-7 mb-7">
            <h2 class="mb-8 text-3xl font-bold text-gray-800">Register</h2>

            <form method="POST" action="{{ route('create.author') }}">
                @csrf
                <div class="mb-4">
                    <label for="name" class="text-sm text-gray-600">Name</label>
                    <input id="name" type="text"
                        class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500"
                        name="name" value="{{ old('name') }}" required />
                    @error('name')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>


                <div class="mb-4">
                    <label for="gender" class="text-sm text-gray-600">Gender</label>
                    <select id="gender"
                        class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500"
                        name="gender" required>
                        <option value="" disabled selected>Select Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="others">Others</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="email" class="text-sm text-gray-600">Email Address</label>
                    <input id="email" type="email"
                        class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500"
                        name="email" value="{{ old('email') }}" required />
                    @error('email')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="text-sm text-gray-600">Password</label>
                    <input id="password" type="password"
                        class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500"
                        name="password" required minlength="8" />
                        @error('password')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex justify-between mt-8">
                    <button type="submit"
                        class="w-full px-4 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">
                        Register
                    </button>
                </div>

                <div class="flex w-full mt-4">
                    <a href="{{ route('github.redirect') }}"
                        class="flex items-center justify-center w-1/2 px-4 py-2 rounded-md bg-zinc-950 hover:bg-zinc-900 focus:outline-none focus:bg-zinc-900 ">
                        <i class="mr-2 text-white fa fa-github"></i>
                        <span class="text-white">Github</span>
                    </a>

                    <div class="mx-2"></div> <a href="{{ route('google.redirect') }}"
                        class="flex items-center justify-center w-1/2 px-4 py-2 bg-red-500 rounded-md hover:bg-red-600 focus:outline-none focus:bg-red-600">
                        <i class="mr-2 text-white fa fa-google"></i>
                        <span class="text-white">Google</span>
                    </a>
                </div>

            </form>
        </div>
    </div>


@endsection
