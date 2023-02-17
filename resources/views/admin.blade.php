@extends('layouts.app')

@section('content')
    <div class='mx-6'>
        <nav class='bg-sky-700 py-4 px-6 rounded-xl flex shadow-sm justify-between mb-10'>
            <div class='text-2xl text-sky-300 font-semibold'>
                iTickets
            </div>

            <div class='flex gap-4'>
                <a href='/' class='hover:text-sky-600' >Home</a>
                <a href='/admin/user' class='hover:text-sky-600'>Admin</a>
                <form metdod="POST" action="{{ route('logout') }}" >
                    @csrf
                    <button class='text-red-400'> {{__('Logout')}} </button>
                </form>
            </div>
        </nav>

        <div class='rounded-xl bg-white shadow-sm flex min-h-[32rem] overflow-hidden'>
            <div class='bg-sky-700 md:w-[12rem] p-5 flex flex-col gap-4 text-white'>
                <a class='hover:text-sky-300' href='/admin/ticket'>Tickets</a>
                <span class='block w-1/2 h-0.5 bg-gray-200'></span>
                <a class='hover:text-sky-300' href='/admin/user'>Utilsateurs</a>
                <span class='block w-1/2 h-0.5 bg-gray-200'></span>
                <a class='hover:text-sky-300' href='/admin/category'>Categories</a>
                <span class='block w-1/2 h-0.5 bg-gray-200'></span>
                <a class='hover:text-sky-300' href='/admin/status'>Etats</a>
                <span class='block w-1/2 h-0.5 bg-gray-200'></span>
            </div>
            @yield('main')
        </div>
    </div>
@endsection
