@extends('admin')
@section('main')

    <div class='px-12 py-3 text-sm'>

        <h1 class='text-xl mt-2 mb-6'>Utilsateur</h1>

        <form method="POST" action="/admin/user"  class='flex flex-col gap-3'>
            @method('PATCH')
            @csrf
            <input type='hidden' name='id' value="{{$user->id}}" >
            <div class='flex gap-4 items-baseline'>
                <p class='text-sky-800'>id:</p>
                <p>{{$user->id}}</p>
            </div>


            <div class='flex flex-col gap-2'>
                <label for="name" class='text-sky-800'>Nom:</label>
                <div>
                    <input type="name" id="name" name="name" class='w-full p-2 outline-none rounded-md  border'  value="{{$user->name}}" required/>
                    @error('name')
                        <span class='text-red-500 text-[12px]'>{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class='flex flex-col gap-2'>
                    <label for="email" class='text-sky-800'>Email:</label>
                    <div>
                        <input type="email" id="email" name="email" class='w-full p-2 outline-none rounded-md  border'  value="{{$user->email}}" required/>
                        @error('email')
                            <span class='text-red-500 text-[12px]'>{{ $message }}</span>
                        @enderror
                    </div>
            </div>


            <div class='flex flex-wrap gap-2 items-center'>
                <label for="role" class='text-sky-800'>Categorie:</label>

                <div>
                    <select name="role_id" id="role" class='rounded-md  p-1 bg-gray-100 ' >
                        @foreach ($roles as $role)
                            <option value="{{$role->id}}" {{ $role->id == $user->role_id ? "selected" : "" }} >{{ $role->name }}</option>
                        @endforeach
                    </select>
                    @error('role_id)')
                        <span class='text-red-500 text-[12px]'>{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <button class='border border-red-600 bg-red-200 hover:bg-red-400 py-2 px-2 rounded-md w-fit mt-3'>Modifier</button>
        </form>
    </div>
@endsection
