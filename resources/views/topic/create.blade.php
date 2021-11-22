@extends('layouts.app')
@section('content')

    <div class="">

        <div class="max-w-2xl mx-auto ">

            <div class=" overflow-hidden shadow-sm sm:rounded-lg text-center">
                <form class=" shadow-md rounded  pt-6 pb-8 mb-4" method="POST" action="{{ route('topic.store') }}">
                    @csrf
                    <div class="py-20 h-screen  px-2">
                        <div class="max-w-md mx-auto rounded-lg overflow-hidden md:max-w-lg">
                            <div class="md:flex">
                                <div class="w-full px-4 py-6 ">
                                    <div class="mb-1"> <span class="text-sm">Title</span> <input type="text" id="title"
                                            name="title"
                                            class="h-12 px-3 w-full border-blue-400 border-2 rounded focus:outline-none focus:border-blue-600">
                                    </div>
                                    <div class="mb-1"> <span class="text-sm">Description</span> <textarea type="text"
                                            id="description" name="description"
                                            class="h-24 py-1 px-3 w-full border-2 border-blue-400 rounded focus:outline-none focus:border-blue-600 resize-none"></textarea>
                                    </div>
                                    <div class="mt-4">
                                        <x-label for="category" :value="__('Category')" />

                                        <select name="categories[]" id="category"
                                            class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div class="mb-1"> <span>Picture</span>
                                        <label class="block text-sm font-medium text-gray-700">
                                            Cover photo
                                        </label>
                                        <div
                                            class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                            <div class="space-y-1 text-center">
                                                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor"
                                                    fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                                    <path
                                                        d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                                <div class="flex text-sm text-gray-600">
                                                    <label for="picture"
                                                        class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                                        <span>Upload a file</span>
                                                        <input id="picture" name="picture" type="file" class="sr-only">
                                                    </label>
                                                    <p class="pl-1">or drag and drop</p>
                                                </div>
                                                <p class="text-xs text-gray-500">
                                                    PNG, JPG, GIF up to 10MB
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>



                            <div class="mt-3 text-right"> <button type="submit"
                                    class="ml-2 h-10 w-32 bg-blue-600 rounded text-white hover:bg-blue-700">Create</button>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        </form>


    </div>
    </div>

@endsection
