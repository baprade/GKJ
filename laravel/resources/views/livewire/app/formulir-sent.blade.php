@section('page_title', $page_title)
<div class="flex flex-col gap-4 p-6 grow sm:p-8 lg:p-10 sm:gap-6">
    <div class="font-semibold uppercase cinzel">
        <div class="text-xl">Formulir</div>
        {{-- <div class="text-2xl">{{ $page_title }}</div> --}}
    </div>

@if (session()->has('message'))
    <div>{{ session('message') }}</div>
    <div>Terima kasih</div>
@endif

</div>
