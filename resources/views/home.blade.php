@extends('layouts.app')

@section('content')
    <div class='mx-6'>
        <nav class='bg-sky-300 py-4 px-6 rounded-xl flex items-center shadow-sm justify-between mb-10'>
            <div class='text-2xl text-cyan-700 font-semibold'>
                iTickets
            </div>

            <div class='flex gap-4'>
                <a href="{{ route('home.index') }}" >Home</a>

                @if (auth()->user()->role->name == 'ADMIN')
                    <a href="{{ route('admin.user.index') }}">Admin</a>
                @endif


                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class='text-white'> {{ __('Logout') }} </button>
                </form>
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
