@extends('home')
@section('main')
    <div class='bg-sky-300 md:w-[12rem] p-5 flex flex-col gap-2'>
        <a class='hover:text-sky-900' href='#'>Mes Tickets</a>
        <span class='block w-1/2 h-0.5 bg-gray-200'></span>
    </div>

    <div class='px-24 py-5 flex '>
        <table class='table-auto text-sm'>
            <thead class='border-b'>
                <tr class='bg-gray-100'>
                    <td class='px-12 py-3 rounded-tl-3xl'>Titre</td>
                    <td class='px-12 py-3'>Etat</td>
                    <td class='px-12 py-3'>Categorie</td>
                    <td class='px-12 py-3'>Date Ouverture</td>
                    <td class='px-12 py-3 rounded-tr-3xl'>Date Update</td>
                </tr>
            </thead>
            <tbody>
                @foreach(auth()->user()->tickets as $ticket)
                    <tr class='bg-gray-100'>
                        <td class='px-12 py-3 rounded-tl-3xl'>Titre</td>
                        <td class='px-12 py-3'>Etat</td>
                        <td class='px-12 py-3'>Categorie</td>
                        <td class='px-12 py-3'>Date Ouverture</td>
                        <td class='px-12 py-3 rounded-tr-3xl'>Date Update</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class='absolute bottom-5 right-5 rounded-full p-8'>

    </div>
@endsection
