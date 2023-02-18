<div class='absolute z-10 left-1/2 -translate-x-1/2 top-20'>

@if ($message = Session::get('success'))
<div class="alert bg-green-100 rounded-lg py-3 min-w-[25rem]   px-6 mb-4 flex items-center  justify-between   text-base text-green-700" role="alert">
    <p> {{ $message }} </p>
    <button type="button" class="btn-close box-content w-2 h-2 p-1 ml-auto text-yellow-900 border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-yellow-900 hover:opacity-75 hover:no-underline" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif


@if ($message = Session::get('error'))
<div class="alert bg-red-100 rounded-lg py-3 min-w-[25rem]  px-6 mb-4 flex items-center  justify-between   text-base text-red-700 " role="alert">
    <p> {{ $message }} </p>
    <button type="button" class="btn-close box-content w-2 h-2 p-1 ml-auto text-yellow-900 border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-yellow-900 hover:opacity-75 hover:no-underline" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif


@if ($message = Session::get('warning'))
<div class="alert bg-yellow-100 rounded-lg py-3 min-w-[25rem]  px-6 mb-4 flex items-center  justify-between   text-base text-yellow-700" role="alert">
    <p> {{ $message }} </p>
    <button type="button" class="btn-close box-content w-2 h-2 p-1 ml-auto text-yellow-900 border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-yellow-900 hover:opacity-75 hover:no-underline" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif


@if ($message = Session::get('info'))
<div class="alert bg-blue-100 rounded-lg py-3 min-w-[25rem]  px-6 mb-4 flex items-center  justify-between   text-base text-blue-700 " role="alert">
    <p> {{ $message }} </p>
    <button type="button" class="btn-close box-content w-2 h-2 p-1 ml-auto text-yellow-900 border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-yellow-900 hover:opacity-75 hover:no-underline" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif


@if ($errors->any())
<div class="alert bg-yellow-100 rounded-lg py-3 min-w-[25rem]  px-6 mb-3 text-base text-yellow-700 inline-flex items-center w-full alert-dismissible fade show" role="alert">
  Vérifier le formulaire pour les erreurs!
  <button type="button" class="btn-close box-content w-2 h-2 p-1 ml-auto text-yellow-900 border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-yellow-900 hover:opacity-75 hover:no-underline" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
</div>
