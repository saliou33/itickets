@extends('layouts.app')

@section('content')
<div class='flex flex-col items-center justify-center min-h-screen'>
    <h1 class='text-3xl text-sky-700 text-bold mb-8' >S'inscrire</h1>
    <form method="POST" action="{{ route('register') }}" class='flex flex-col gap-6 shadow-sm p-8 bg-gray-300 rounded-lg w-[24rem]' >
        @csrf

        <div class='flex flex-col gap-0.5'>
            <label for="name">Nom</label>
            <div>
                <input type="text" id="name" name="name" class='w-full p-2 outline-none rounded-md'/>
                @error('name')
                    <span class='text-red-500 text-[12px]'>{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class='flex flex-col gap-0.5'>
            <label for="email">Email</label>
            <div>
                <input type="email" id="email" name="email" class='w-full p-2 outline-none rounded-md'/>
                @error('email')
                    <span class='text-red-500 text-[12px]'>{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class='flex flex-col gap-0.5'>
            <label for="password">Mot de Passe</label>
            <div>
                <input type="password" id="password" name="password" class='w-full p-2 outline-none rounded-md '/>
                @error('password')
                    <span class='text-red-500 text-[12px]'>{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class='flex flex-col gap-0.5'>
            <label for="password-confirm">Confirmer Mot de Passe</label>
            <div>
                <input type="password" id="password-confirm" name="password_confirmation" class='w-full p-2 outline-none rounded-md '/>
            </div>
        </div>

        <button type="submit" class='bg-sky-700 hover:bg-sky-700 p-2 rounded-md text-white'> Valider </button>

    </form>
    <div class='flex flex-col justify-center items-center text-xs gap-1 mt-2'>
        <p>Vous avez un compte?</p>
        <a href='/login' class='text-teal-500'>Se Connecter</a>
    </div>
</div>
@endsection
