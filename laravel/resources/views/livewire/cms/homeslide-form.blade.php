@section('page_title', config('app.name').' | '.$page_title)
<div id="homeslide" class="flex items-center justify-center lg:p-4 xl:p-6 grow">
    <div class="flex flex-col items-center justify-center bg-white shadow-md rounded-xl">
    <form wire:submit.prevent="save" class="flex flex-col w-full divide-y divide-slate-200">
        <div class="flex items-center justify-center py-3">
            <x-cms.page-title title="{{ $page_title }}"/>
        </div>
        @csrf
        <div class="grid grid-cols-2 gap-4 p-4 bg-slate-50">
        <div class="flex flex-col gap-4">
            <div><x-cms.label-input-text-form name="h1" title="Judul | H1"/></div>
            @if (! empty($form->slug))
            <div><x-cms.label-input-text-disabled-form name="slug" title="Slug"/></div>
            @endif
            <div><x-cms.label-input-text-form name="h2" title="Sub Judul | H2"/></div>
            <div><x-cms.label-textarea-form name="belly" title="Paragraf"/></div>
        </div>

        <div class="flex flex-col gap-4">
            <div>
                <div
                    x-data="{ uploading: false, progress: 0 }"
                    x-on:livewire-upload-start="uploading = true"
                    x-on:livewire-upload-finish="uploading = false"
                    x-on:livewire-upload-cancel="uploading = false"
                    x-on:livewire-upload-error="uploading = false"
                    x-on:livewire-upload-progress="progress = $event.detail.progress"
                >

                <x-cms.label-input-file-form name="photo_file_post" title="Ambil/Pilih File Photo"/>

                <div class="">
                    <div wire:loading wire:target="form.photo_file_post" class="text-sm text-green-600">Uploading...</div>
                        <div x-show="uploading">
                            <progress id="progress" max="100" x-bind:value="progress" class="w-full h-5"></progress>
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div class="flex flex-col items-center gap-1">
                    @if ($form->photo_file ?? null)
                        <div class="text-sm">Photo Sekarang</div>
                        <a href="{{ route('images-homeslide', $form->photo_file) }}" target="_blank"><img class="object-contain text-xs h-28" src="{{ route('images-homeslide', $form->photo_file) }}" alt="{{ $form->photo_file }}"/></a>
                        <span class="flex items-center gap-1"><span class="text-sm">Hapus Foto</span><x-cms.href-delete-foto :item="$form"/></span>
                    @else
                        <div class="text-sm">Tiada Photo</div>
                    @endif
                </div>
                <div class="flex flex-col items-center gap-1">
                    @if ($form->photo_file_post ?? null)
                        <div class="text-sm">Photo Baru</div>
                        <img class="object-contain h-32" src="{{ $form->photo_file_post->temporaryUrl() }}"/>
                    @endif
                </div>
            </div>
        </div>
        </div>
        <div class="flex items-center justify-between gap-4 p-4">
            <x-cms.href-back href="{{ route('cms-homeslide') }}" title="HomeSlide" awesome="fa-solid fa-reply"/>
            <x-cms.button-save title="Simpan"/>
        </div>
    </form>
</div>

@if (session()->has('message'))
    @if (session('theme') == 'warning')
        <x-cms.notif-warning message="{{ session('message') }}"/>
    @endif
    @if (session('theme') == 'success')
        <x-cms.notif-success message="{{ session('message') }}"/>
    @endif
@endif

</div>
