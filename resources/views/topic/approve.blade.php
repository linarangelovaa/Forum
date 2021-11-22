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

        @foreach ($topics as $topic)

            <div class="max-w-lg my-4 mx-auto overflow-hidden lg:max-w-5xl" data-id="{{ $topic->id }}">
                <div class="flex flex-col">
                    <div class="bg-gray-900 border border-gray-900 shadow-lg  rounded-3xl p-4 m-4">
                        <div class="flex-none sm:flex">
                            <div class=" relative h-32 w-32   sm:mb-0 mb-3">
                                <img src="picture/{{$topic->picture}}" alt=" "
                                    class=" w-32 h-32 object-cover rounded-2xl">

                            </div>
                            <div class="flex-auto sm:ml-5 ">
                                <div class="flex items-center justify-between sm:mt-2">
                                    <div class="flex items-center">
                                        <div class="flex flex-col">
                                            <div class="my-2w-full flex-none text-lg text-gray-200 font-bold leading-none">
                                                 {{ $topic->title }}
                                            </div>
                                            <div class="flex-auto text-gray-400 my-3">
                                                <span class="mr-3 ">
                                                {{ $topic->category->name}}</span>
                                                <span
                                                    class="mr-3 border-r border-gray-600  max-h-0"></span>
                                                    <span> {{$topic->user->username }}
                                                     </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex pt-2  text-sm text-gray-400">
                                    <div class="flex-1 inline-flex items-center my-4">

                                        <p class=""> {{ $topic->description }}</p>
                                    </div>
                                    <div class="flex-1 inline-flex items-center">

                                        <p class="">Add comment</p>
                                    </div>
                                    @if (Auth::user()->role->name == 'Admin')
                                        <div class="p-1 m-1">
                                            <form action="{{ route('topic.update', $topic->id) }}" method="POST">
                                                @method('PUT')

                                                @csrf
                                                <button class="text-sm text-white-600" type="submit">Edit</button>

                                        </form>
                                            {{-- <button class="deletebtn  text-sm text-white-600" data-id="{{ $topic->id }}">
                                                {{ __('Delete') }}
                                            </button> --}}
                                            {{-- <a class="text-sm text-white-600"
                                                href="{{ route('topic.destroy') }}">Delete</a> --}}
                                            <form action="{{ route('topic.destroy', $topic->id) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button class="text-sm text-white-600" type="submit">Delete</button>
                                            </form>
                                            @if(($currentroute = Route::currentRouteName())=='topic.approve')
                                            <form action="{{ route('topic.homepage') }}" method="POST">
                                                @csrf
                                                <button class="text-sm text-white-600" type="submit">Approve</button>
                                            </form>
                                            @endif

                                        </div>
                                     {{--    @if({{ route('topic.approve') }}) --}}

                                    @else
                                        @if (!empty($topic->user_id))
                                            @if ($topic->user_id == Auth::id())
                                                <div class="p-1 m-1">
                                                    <a class=" text-sm text-white-600 "
                                                        href="{{ route('topic.edit', $topic->id) }}">
                                                        {{ __('Edit') }}
                                                    </a>
                                                    {{-- <button class="deletebtn  text-sm text-white-600 "
                                                        data-id="{{ $topic->id }}">
                                                        {{ __('Delete') }}
                                                    </button> --}}
                                                    <form action="{{ route('topic.destroy', $topic->id) }}" method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button class="text-sm text-white-600" type="submit">Delete</button>
                                                    </form>



                                                </div>
                                            @else
                                                <p style="color:red;">Not availbale for edit and delete</p>
                                            @endif
                                        @else

                                        @endif
                                    @endif



                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach



    </div>
    {{-- @section('script')
    <script>
        $(document).on('click', '.deletebtn', function() {

            var id = $(this).attr('data-id')
            $.ajax({
                url: '/topics/' + id,
                type: 'DELETE',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    toastr.success(response.success)
                    $('div').get(data("id")).remove()
                    /*  $('div[data-id="' + id + '"]').remove() */
                }
            })
        })
    </script> --}}

@endsection
