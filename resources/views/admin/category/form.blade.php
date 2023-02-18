@extends('admin')
@section('main')

    <div class='px-12 py-3 text-sm'>

        <h1 class='text-xl mt-2 mb-6'>Categorie</h1>

        <form method="POST" action="/admin/category"  class='flex flex-col gap-3 min-w-[25rem]'>
            @method('PATCH')
            @csrf
            <input type='hidden' name='id' value="{{$category->id}}" >
            <div class='flex gap-3 items-baseline'>
                <p class='text-sky-800'>id:</p>
                <p>{{$category->id}}</p>
            </div>

            <div class='flex flex-col gap-2'>
                <label for="name" class='text-sky-800'>Nom:</label>
                <div>
                    <input type="name" id="name" name="name" class='w-full p-2 outline-none rounded-md  border'  value="{{$category->name}}" required />
                    @error('name')
                        <span class='text-red-500 text-[12px]'>{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <button class='border border-red-600 bg-red-200 hover:bg-red-400 py-2 px-2 rounded-md w-fit mt-3'>Modifier</button>
        </form>
    </div>
@endsection
