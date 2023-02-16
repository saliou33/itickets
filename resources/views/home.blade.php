@extends('layouts.app')

@section('content')
    <div class='mx-6'>
        <nav class='bg-sky-300 py-4 px-6 rounded-xl flex shadow-sm justify-between mb-10'>
            <div class='text-2xl text-cyan-700 font-semibold'>
                iTickets
            </div>

            <div>
                <form metdod="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class='text-gray-500'> {{__('Logout')}} </button>
                </form>
            </div>
        </nav>

        <div class='rounded-xl bg-white shadow-sm flex min-h-[32rem] overflow-hidden'>
                @yield('main')
        </div>
    </div>
@endsection
