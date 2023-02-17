@extends('home')
@section('main')

    <div class='px-12 py-3 text-sm'>

        <a href='/' class='relative -left-8 top-2'>
            <svg class='fill-sky-700' xmlns="http://www.w3.org/2000/svg" id="Outline" viewBox="0 0 24 24" width="32" height="32"><path d="M19,11H9l3.29-3.29a1,1,0,0,0,0-1.42,1,1,0,0,0-1.41,0l-4.29,4.3A2,2,0,0,0,6,12H6a2,2,0,0,0,.59,1.4l4.29,4.3a1,1,0,1,0,1.41-1.42L9,13H19a1,1,0,0,0,0-2Z"/></svg>
        </a>

        <h1 class='text-xl mt-2 mb-6'>Ticket</h1>

        <form method="POST" action="/ticket/s/all"  class='flex flex-col gap-3'>
            @method('PATCH')
            @csrf
            <input type='hidden' name='id' value="{{$ticket->id}}" >
            <div class='flex gap-4 items-baseline'>
                <p class='text-sky-800'>id:</p>
                <p>{{$ticket->id}}</p>
            </div>



            <div class='flex flex-wrap gap-2 items-center'>
                <label for="status" class='text-sky-800'>Etat:</label>

                <div>
                    <select name="status_id" id="status" class='rounded-sm p-1 bg-gray-100 ' value="{{$ticket->category_id}}">
                        @foreach ($statuses as $status)
                            <option value="{{$status->id}}" {{ $status->id == $ticket->status_id ? "selected" : "" }}>{{ $status->name }}</option>
                        @endforeach
                    </select>
                    @error('status_id)')
                        <span class='text-red-500 text-[12px]'>{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class='flex flex-col gap-2'>
                <label for="title" class='text-sky-800'>Titre:</label>
                <div>
                    <input type="title" id="title" name="title" class='w-full p-2 outline-none rounded-sm border'  value="{{$ticket->title}}" required disabled/>
                    @error('title')
                        <span class='text-red-500 text-[12px]'>{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class='flex flex-col gap-2'>
                <label for="message" class='text-sky-800'>Description:</label>
                <div class='flex-1'>
                    <textarea id='message' name='message' class='h-24 p-2 w-full border overflow-y-scroll rounded-sm outline-none md:w-[25rem]' required disabled>{{$ticket->message}}</textarea>

                    @error('message')
                        <span class='text-red-500 text-[12px]'>{{ $message }}</span>
                    @enderror
                </div>
            </div>


            <div class='flex flex-wrap gap-2 items-center'>
                <label for="category" class='text-sky-800'>Categorie:</label>

                <div>
                    <select name="category_id" id="category" class='rounded-sm p-1 bg-gray-100 ' value="{{$ticket->category_id}}" disabled>
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}"  {{ $category->id == $ticket->category_id ? "selected" : "" }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id)')
                        <span class='text-red-500 text-[12px]'>{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <button class='border border-red-600 bg-red-200 hover:bg-red-400 py-2 px-2 rounded-md w-fit mt-3'>Modifier</button>
        </form>
    </div>
@endsection
