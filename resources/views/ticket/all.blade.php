@extends('home')
@section('main')

    <div class='px-12 py-5 text-sm'>
        <h1 class='text-xl mb-6'>Tous les Tickets</h1>
        <table class='table-auto font-serif'>
            <thead class='border-b'>
                <tr class='bg-gray-100 text-[1.1rem]'>
                    <td class='px-8 py-3 rounded-tl-2xl'>Titre</td>
                    <td class='px-8 py-3'>Etat</td>
                    <td class='px-8 py-3'>Categorie</td>
                    <td class='px-8 py-3'>Date Ouverture</td>
                    <td class='px-8 py-3'>Date Update</td>
                    <td class='px-8 py-3 rounded-tr-2xl'>Actions</td>
                </tr>
            </thead>

            <tbody>
                @foreach($tickets as $ticket)
                    <tr class='border-b h-4'>
                        <td class='px-8 py-2'>{{$ticket->title}}</td>
                        <td class='px-8 py-2'>{{$ticket->status->name}}</td>
                        <td class='px-8 py-2'>{{$ticket->category->name}}</td>
                        <td class='px-8 py-2'>{{$ticket->created_at}}</td>
                        <td class='px-8 py-2'>{{$ticket->updated_at}}</td>
                        <td class='flex px-6 items-center gap-3 justify-start'>

                            <button class='py-2'>
                                <a href="/ticket/s/all/{{$ticket->id}}">
                                    <svg class='fill-yellow-400' xmlns="http://www.w3.org/2000/svg" id="Outline" viewBox="0 0 24 24" width="20" height="20"><path d="M18.656.93,6.464,13.122A4.966,4.966,0,0,0,5,16.657V18a1,1,0,0,0,1,1H7.343a4.966,4.966,0,0,0,3.535-1.464L23.07,5.344a3.125,3.125,0,0,0,0-4.414A3.194,3.194,0,0,0,18.656.93Zm3,3L9.464,16.122A3.02,3.02,0,0,1,7.343,17H7v-.343a3.02,3.02,0,0,1,.878-2.121L20.07,2.344a1.148,1.148,0,0,1,1.586,0A1.123,1.123,0,0,1,21.656,3.93Z"/><path d="M23,8.979a1,1,0,0,0-1,1V15H18a3,3,0,0,0-3,3v4H5a3,3,0,0,1-3-3V5A3,3,0,0,1,5,2h9.042a1,1,0,0,0,0-2H5A5.006,5.006,0,0,0,0,5V19a5.006,5.006,0,0,0,5,5H16.343a4.968,4.968,0,0,0,3.536-1.464l2.656-2.658A4.968,4.968,0,0,0,24,16.343V9.979A1,1,0,0,0,23,8.979ZM18.465,21.122a2.975,2.975,0,0,1-1.465.8V18a1,1,0,0,1,1-1h3.925a3.016,3.016,0,0,1-.8,1.464Z"/></svg>
                                </a>
                            </button>

                            @if (($n = ($ticket->support_id < 0)) || $ticket->support_id == auth()->user()->id)
                                <form method='POST' action="{{ route('home.assign') }}">
                                    @csrf
                                    <input type='hidden' name='ticket_id' value='{{$ticket->id}}'/>
                                    <input type='hidden' name='support_id' value='{{auth()->user()->id}}'/>

                                    <button type='submit'>
                                        <svg xmlns="http://www.w3.org/2000/svg"  class="{{ $n ? 'fill-gray-500' : 'fill-sky-500' }}"  id="Filled" viewBox="0 0 24 24" width="20" height="20"><path d="M1.327,12.4,4.887,15,3.535,19.187A3.178,3.178,0,0,0,4.719,22.8a3.177,3.177,0,0,0,3.8-.019L12,20.219l3.482,2.559a3.227,3.227,0,0,0,4.983-3.591L19.113,15l3.56-2.6a3.227,3.227,0,0,0-1.9-5.832H16.4L15.073,2.432a3.227,3.227,0,0,0-6.146,0L7.6,6.568H3.231a3.227,3.227,0,0,0-1.9,5.832Z"/></svg>
                                    </button>
                                </form>
                            @endif

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
