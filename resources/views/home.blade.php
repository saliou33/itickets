@extends('layouts.app')

@section('content')
    <div class='mx-6'>

        @include('utils.flash')

        <nav class='bg-sky-300 py-4 px-6 rounded-xl flex items-center shadow-sm justify-between mb-10'>
            <div class='text-2xl text-cyan-700 font-semibold'>
                iTickets
            </div>


            <div class='flex gap-4 items-center'>
                <a href="{{ route('home.index') }}" >Home</a>

                @if (auth()->user()->role->name == 'ADMIN')
                    <a href="{{ route('admin.user.index') }}">Admin</a>
                @endif

                <div class="flex justify-center">
                <div>
                    <div class="dropdown relative">
                    <button
                        class="
                        dropdown-toggle
                        transition
                        duration-150
                        ease-in-out
                        flex
                        items-center
                        whitespace-nowrap
                        fill-sky-400
                        p-1
                        bg-white
                        rounded-full
                        "
                        type="button"
                        id="dropdownMenuButton1"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve" width="20" height="20">
                        <g>
                            <circle cx="256" cy="128" r="128"/>
                            <path d="M256,298.667c-105.99,0.118-191.882,86.01-192,192C64,502.449,73.551,512,85.333,512h341.333   c11.782,0,21.333-9.551,21.333-21.333C447.882,384.677,361.99,298.784,256,298.667z"/>
                        </g>
                        </svg>
                    </button>
                    <ul
                        class="
                        dropdown-menu
                        min-w-max
                        absolute
                        hidden
                        bg-white
                        text-base
                        z-50
                        float-left
                        py-2
                        list-none
                        text-left
                        rounded-lg
                        shadow-lg
                        mt-1
                        m-0
                        bg-clip-padding
                        border-none
                        "
                        aria-labelledby="dropdownMenuButton1"
                    >
                        <li>
                            <a
                                class="
                                dropdown-item
                                text-sm
                                py-2
                                px-4
                                font-normal
                                block
                                w-full
                                whitespace-nowrap
                                bg-transparent
                                text-gray-700
                                hover:bg-gray-100
                                "
                                href="/user/{{auth()->user()->id}}"
                                >Profil</a
                            >
                        </li>

                        <li>
                            <form method="POST" action="{{ route('logout') }}" >
                                @csrf
                                <button
                                type='submit'
                                class='
                                    dropdown-item
                                    text-sm
                                    py-2
                                    px-4
                                    font-normal
                                    w-full
                                    whitespace-nowrap
                                    bg-transparent
                                    text-gray-700
                                hover:bg-gray-100
                                '
                                > {{__('Logout')}} </button>
                            </form>
                        </li>


                    </ul>
                    </div>
                </div>
                </div>
            </div>
        </nav>

        <div class='rounded-xl bg-white shadow-sm flex min-h-[32rem] overflow-hidden'>
            <div class='bg-sky-300 md:w-[12rem] p-5 flex flex-col gap-4'>
                <a class='hover:text-sky-900' href='/'>Mes Tickets</a>
                <span class='block w-1/2 h-0.5 bg-gray-200'></span>

                @if(auth()->user()->role->name != 'CLIENT')
                <a class='hover:text-sky-900' href='/ticket/s/all'>Tous les Tickets</a>
                <span class='block w-1/2 h-0.5 bg-gray-200'></span>
                @endif
            </div>
                @yield('main')
        </div>
    </div>
@endsection
