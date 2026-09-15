@section('page_title', $page_title)
<div id="products" class="flex items-center justify-center grow lg:p-4 xl:p-6">
    <div class="flex flex-col w-full h-full gap-4 p-0 bg-white lg:p-0 lg:w-auto lg:h-auto lg:shadow-md lg:rounded-xl">
    <form wire:submit.prevent="save" class="flex flex-col w-full divide-y divide-slate-200">
        <div class="flex items-center justify-center py-3">
            <x-cms.page-title title="{{ $page_title }}"/>
        </div>
        @csrf
        <div class="flex flex-col gap-4 p-4 bg-slate-50">
            <x-cms.label-input-text-disabled name="h1" title="Judul / H1"/>
            <div>
                <div class="px-3 text-sm font-semibold text-start">Foto Utama</div>
                @if (! empty($photo_file))
                    <a class="flex justify-center" href="{{ route('images-large', $photo_file) }}" target="_blank">
                        <img class="w-24 mx-auto text-xs rounded" src="{{ route('images-small', $photo_file) }}" alt="{{ $photo_file }}"/>
                    </a>
                @else
                    <div class="text-xs text-center">-tiadafoto-</div>
                @endif
            </div>

            <div>
                <div
                    x-data="{ uploading: false, progress: 0 }"
                    x-on:livewire-upload-start="uploading = true"
                    x-on:livewire-upload-finish="uploading = false"
                    x-on:livewire-upload-cancel="uploading = false"
                    x-on:livewire-upload-error="uploading = false"
                    x-on:livewire-upload-progress="progress = $event.detail.progress"
                >

                <x-cms.label-input-file name="photo_file_post" title="Ambil/Pilih File Photo"/>

                <div class="">
                    <div wire:loading wire:target="photo_file_post" class="text-sm text-green-600">Uploading...</div>
                        <div x-show="uploading">
                            <progress id="progress" max="100" x-bind:value="progress" class="w-full h-5"></progress>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col items-center gap-1">
                @if ($photo_file_post ?? null)
                    <div class="text-sm">Tambah Foto Baru</div>
                    <img class="object-contain h-24" src="{{ $photo_file_post->temporaryUrl() }}"/>
                @endif
            </div>
@if ($items->isNotEmpty())
            <div class="flex items-center justify-center gap-2">
    @foreach ($items as $item)
                <div class="flex flex-col items-center gap-1">
                    <a href="{{ route('images-large', $item->photo_file) }}" target="_blank"><img class="object-contain h-16 text-xs rounded" src="{{ route('images-small', $item->photo_file) }}" alt="{{ $item->photo_file }}"/></a>
                    <span class="flex items-center gap-1"><span class="text-sm">Hapus Foto</span><x-cms.href-delete-foto :item="$item"/></span>
                </div>
    @endforeach
            </div>
@else
            <div class="text-sm">-galeri masih kosong-</div>

@endif
        </div>

        <div class="flex items-center justify-between gap-4 p-4">
            <x-cms.href-back href="{{ route('cms-posts-edit', ['id' => $post_id]) }}" title="Edit Post" awesome="fa-solid fa-reply"/>
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
