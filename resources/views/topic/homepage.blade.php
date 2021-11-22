@extends('layouts.app')

@section('header')
    <h1 class="font-semibold text-xl text-gray-800 leading-tight text-center">
        {{ __('Welcome to the Forum') }}
    </h1>
@endsection

@section('content')

    <div class="  py-12">

        <div class="max-w-lg my-4 mx-auto overflow-hidden lg:max-w-5xl">
            <form action="{{ route('topic.create') }}">

                <button type="submit"
                    class="inline-flex items-center my-4 px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">Add
                    new discussion</button>
            </form>

            @if (Auth::user()->isAdmin())
                <form action="{{ route('topic.approve') }}">

                    <button type="submit"
                        class="inline-flex items-center  px-4 py-2 bg-blue-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">Approve
                        discussions</button>
                </form>
            @endif
        </div>

        {{-- @foreach ($topics as $topic)
            <div class="max-w-lg my-4 mx-auto bg-white rounded-xl shadow-md overflow-hidden lg:max-w-5xl">
                <div class="md:flex">
                    <div class="md:flex-shrink-0">
                        <img class="h-48 w-full object-cover md:h-full md:w-48" src="picture/{{ $topic->picture }}"
                            alt=" ">
                    </div>
                    <div class="p-8">
                        <div class="uppercase tracking-wide text-sm text-indigo-500 font-semibold">
                            <p>
                                 @foreach ($topic->categories as $category)
                                        {{ $category->name }} @endforeach
                            </p>
                        </div>
                        <a href="#"
                            class="block mt-1 text-lg leading-tight font-medium text-black hover:underline">{{ $topic->title }}</a>
                        <p class="mt-2 text-gray-500">{{ $topic->description }}</p>

                        <p class="mt-2 text-gray-500">
                            @foreach ($topic->users as $user){{ $user->username }}
                                @endforeach
                        </p>

                    </div>

                </div>
            </div>
        @endforeach --}}
    </div>





@endsection
