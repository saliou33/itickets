@extends('admin')
@section('main')

    <div class='px-12 py-5 text-sm'>
        <h1 class='text-xl mb-6'>Tickets</h1>
        <table class='table-auto font-serif overflow-x-scroll'>
            <thead class='border-b'>
                <tr class='bg-gray-100 text-[1.1rem]'>
                    <td class='px-8 py-3 rounded-tl-2xl'>Titre</td>
                    <td class='px-8 py-3'>User Id</td>
                    <td class='px-8 py-3'>Etat</td>
                    <td class='px-8 py-3'>Categorie</td>
                    <td class='px-8 py-3'>Date Ouverture</td>
                    <td class='px-8 py-3'>Date Modification</td>
                    <td class='px-8 py-3 rounded-tr-2xl'>Actions</td>
                </tr>
            </thead>

            <tbody>
                @foreach($tickets as $ticket)
                    <tr class='border-b h-4'>
                        <td class='px-8 py-2'>{{$ticket->title}}</td>
                        <td class='px-8 py-2'>{{$ticket->user->id}}</td>
                        <td class='px-8 py-2'>{{$ticket->status->name}}</td>
                        <td class='px-8 py-2'>{{$ticket->category->name}}</td>
                        <td class='px-8 py-2'>{{$ticket->created_at}}</td>
                        <td class='px-8 py-2'>{{$ticket->updated_at}}</td>
                        <td class='flex justify-center items-center gap-3'>

                            <button class='py-2'>
                                <a href="/admin/ticket/{{$ticket->id}}">
                                    <svg class='fill-yellow-400' xmlns="http://www.w3.org/2000/svg" id="Outline" viewBox="0 0 24 24" width="20" height="20"><path d="M18.656.93,6.464,13.122A4.966,4.966,0,0,0,5,16.657V18a1,1,0,0,0,1,1H7.343a4.966,4.966,0,0,0,3.535-1.464L23.07,5.344a3.125,3.125,0,0,0,0-4.414A3.194,3.194,0,0,0,18.656.93Zm3,3L9.464,16.122A3.02,3.02,0,0,1,7.343,17H7v-.343a3.02,3.02,0,0,1,.878-2.121L20.07,2.344a1.148,1.148,0,0,1,1.586,0A1.123,1.123,0,0,1,21.656,3.93Z"/><path d="M23,8.979a1,1,0,0,0-1,1V15H18a3,3,0,0,0-3,3v4H5a3,3,0,0,1-3-3V5A3,3,0,0,1,5,2h9.042a1,1,0,0,0,0-2H5A5.006,5.006,0,0,0,0,5V19a5.006,5.006,0,0,0,5,5H16.343a4.968,4.968,0,0,0,3.536-1.464l2.656-2.658A4.968,4.968,0,0,0,24,16.343V9.979A1,1,0,0,0,23,8.979ZM18.465,21.122a2.975,2.975,0,0,1-1.465.8V18a1,1,0,0,1,1-1h3.925a3.016,3.016,0,0,1-.8,1.464Z"/></svg>
                                </a>
                            </button>
                            <form action="/admin/ticket{{$ticket->id}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class='py-2' type='submit'>
                                    <svg  class='fill-red-400' xmlns="http://www.w3.org/2000/svg" id="Outline" viewBox="0 0 24 24" width="22" height="22"><path d="M21,4H17.9A5.009,5.009,0,0,0,13,0H11A5.009,5.009,0,0,0,6.1,4H3A1,1,0,0,0,3,6H4V19a5.006,5.006,0,0,0,5,5h6a5.006,5.006,0,0,0,5-5V6h1a1,1,0,0,0,0-2ZM11,2h2a3.006,3.006,0,0,1,2.829,2H8.171A3.006,3.006,0,0,1,11,2Zm7,17a3,3,0,0,1-3,3H9a3,3,0,0,1-3-3V6H18Z"/><path d="M10,18a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,10,18Z"/><path d="M14,18a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,14,18Z"/></svg>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="">
        <div>
        <button type="button" class="absolute z-50 bottom-6 right-3  rounded-full inline-block w-[3rem] h-[3rem] bg-sky-700 text-white font-medium text-4xl leading-tight uppercase shadow-md hover:bg-sky-500 hover:shadow-lg focus:bg-sky-500 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-400 active:shadow-lg transition duration-150 ease-in-out" data-bs-toggle="modal" data-bs-target="#exampleModalCenteredScrollable">
            +
        </button>
        </div>

        <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="exampleModalCenteredScrollable" tabindex="-1" aria-labelledby="exampleModalCenteredScrollable" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable relative w-auto pointer-events-none">
            <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
            <div class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
                <h5 class="text-xl font-medium leading-normal text-gray-800" id="exampleModalCenteredScrollableLabel">
                    Creer Un Ticket
                </h5>
                <button type="button"
                class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
                data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('admin.ticket.store') }}">
                <div class="modal-body relative p-4 text-sm">
                    <div class='flex flex-col gap-4'>
                        @csrf
                        <div class='flex flex-col gap-2'>
                            <label for="title">Titre</label>
                            <div class='flex-1'>
                                <input type="title" id="title" name="title" class='w-full p-2 outline-none rounded-md  border' required/>
                                @error('title')
                                    <span class='text-red-500 text-[12px]'>{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class='flex flex-col gap-2'>
                            <label for="title">User ID</label>
                            <div class='flex-1'>
                                <input type="user_id" id="user_id" name="user_id" class='w-full p-2 outline-none rounded-md  border' required/>
                                @error('user_id')
                                    <span class='text-red-500 text-[12px]'>{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                        <div class='flex flex-col gap-2'>
                            <label for="message">Description</label>
                            <div class='flex-1'>
                                <textarea id='message' name='message' class='h-24 p-2 w-full border overflow-y-scroll rounded-md  outline-none' required></textarea>

                                @error('message')
                                    <span class='text-red-500 text-[12px]'>{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class='flex flex-wrap gap-2 items-center'>
                            <label for="category">Etat:</label>
                            <div class='flex-1'>
                               <select name="status_id" id="status" class='rounded-md  py-2 px-3 bg-gray-100'>
                                    @foreach ($statuses as $status)
                                        <option value="{{$status->id}}">{{$status->name}}</option>
                                    @endforeach
                               </select>
                                @error('status_id)')
                                    <span class='text-red-500 text-[12px]'>{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class='flex flex-wrap gap-2 items-center'>
                            <label for="category">Categorie:</label>
                            <div class='flex-1'>
                               <select name="category_id" id="category" class='rounded-md  py-2 px-3 bg-gray-100'>
                                    @foreach ($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                               </select>
                                @error('category_id)')
                                    <span class='text-red-500 text-[12px]'>{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div
                    class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md">
                    <button type="button"
                        class="inline-block px-6 py-2.5 bg-red-400 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-red-800 hover:shadow-lg focus:bg-purple-400 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-purple-400 active:shadow-lg transition duration-150 ease-in-out"
                        data-bs-dismiss="modal">
                        Annuler
                    </button>

                    <button type="submit"
                        class="inline-block px-6 py-2.5 bg-sky-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-sky-700 hover:shadow-lg focus:bg-sky-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-sky-800 active:shadow-lg transition duration-150 ease-in-out ml-1">
                        Valider
                    </button>
                </div>
            </form>
            </div>
        </div>
    </div>
@endsection
