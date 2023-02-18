@extends('layouts.app')

@section('content')
<div class='flex flex-col items-center justify-center min-h-screen'>
    <h1 class='text-3xl text-teal-600 text-bold mb-8' >Se Connecter</h1>
    <form method="POST" action="{{ route('login') }}" class='flex flex-col gap-6 shadow-sm p-8 bg-gray-300 rounded-lg w-[24rem]' >
        @csrf

        <div class='flex flex-col gap-0.5'>
            <label for="email">Email</label>
            <div>
                <input type="email" id="email" name="email" class='w-full p-2 outline-none rounded-md '/>
                @error('email')
                    <span class='text-red-500 text-[12px]'>{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class='flex flex-col gap-0.5'>
            <label for="password">Password</label>
            <div>
                <input type="password" id="password" name="password" class='w-full p-2 outline-none rounded-md  '/>
                @error('password')
                    <span class='text-red-500 text-[12px]'>{{ $message }}</span>
                @enderror
            </div>
        </div>

        <button type="submit" class='bg-teal-400 hover:bg-teal-500 p-2 rounded-md '> {{ __('Login') }} </button>

    </form>
    <div class='flex flex-col justify-center items-center text-xs gap-1 mt-2'>
        <p>Vous n'avez pas de compte?</p>
        <a href='/register' class='text-sky-600'>S'inscrire</a>
    </div>
</div>
@endsection
