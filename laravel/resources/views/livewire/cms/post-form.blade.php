@section('page_title', $page_title)
<div id="post" class="flex items-start justify-center grow lg:p-4 xl:p-6">
    <div class="flex flex-col w-full h-full gap-4 p-0 bg-white lg:p-0 lg:h-auto lg:shadow lg:rounded-md">
    <form wire:submit.prevent="save" class="flex flex-col w-full divide-y divide-slate-200">
        <div class="flex items-center justify-center py-3">
            <x-cms.page-title title="{{ $page_title }}"/>
        </div>
        @csrf
        <div class="grid gap-4 p-4 lg:grid-cols-2 bg-slate-50">
            <div class="flex flex-col self-start h-full gap-4">
                <div class="flex gap-4">
                    <x-cms.label-select-form name="id_format" title="Format" :options="$formats_array"/>
                    <x-cms.label-select-form name="id_category" title="Category" :options="$categories_array"/>
                </div>
                <div><x-cms.label-input-text-form name="h1" title="Judul | H1"/></div>
                @if (! empty($form->slug))
                <div><x-cms.label-input-text-disabled-form name="slug" title="Slug"/></div>
                @endif
                <div><x-cms.label-input-text-form name="h2" title="Sub Judul | H2"/></div>
                <div><x-cms.label-input-text-form name="key_word" title="Keyword"/></div>
                {{-- <div><x-cms.label-input-text-form name="key_word" title="Keyword"/></div> --}}
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
                            <a href="{{ route('images-large', $form->photo_file) }}" target="_blank"><img class="object-contain text-xs h-28" src="{{ route('images-small', $form->photo_file) }}" alt="{{ $form->photo_file }}"/></a>
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
                <div class="grid grid-cols-2 gap-4">
                    <div><x-cms.label-input-text-form name="photo_grafer" title="Photografer" /></div>
                    <div><x-cms.label-textarea-form name="photo_caption" title="Photo Caption" /></div>
                </div>

            @if (!empty($form->id))
                <div><x-cms.href-add-delete-text href="{{ route('cms-posts-photos', ['post_id' => $form->id]) }}" title="Foto Galeri [{{ $form->photos }}]"/></div>
@if ($photos->isNotEmpty())
                <div class="flex items-center justify-center gap-2">
    @foreach ($photos as $item)

                    <a href="{{ route('images-large', $item->photo_file) }}" target="_blank"><img class="object-contain h-10 text-xs rounded" src="{{ route('images-small', $item->photo_file) }}" alt="{{ $item->photo_file }}"/></a>
    @endforeach
                </div>
@else
                <div class="text-sm">-galeri masih kosong-</div>

@endif
            @endif

                <div class="flex gap-3">
                    <div class="grow"><x-cms.label-input-text-form name="youtube" title="Youtube ID"/></div>
                    @if (! empty($form->youtube))<div class="flex gap-3">
                        @foreach (explode(',', $form->youtube) as $item)
                            <a href="https://www.youtube.com/watch?v={{ $item }}" target="_blank"><img src="https://i.ytimg.com/vi/{{ $item }}/mqdefault.jpg" alt="youtube" class="object-cover w-16 h-16 text-xs rounded"/></a>
                        @endforeach
                    </div>@endif
                </div>
            </div>

            <div class="flex flex-col gap-4">
                <div>
                    <label class="px-3 text-sm font-semibold cursor-pointer text-start" for="belly">Konten</label>

<div wire:ignore class="text-start">

<textarea id="belly">{{ $form->belly ?? null }}</textarea>
<script>
$('#belly').summernote({
    toolbar: [
        ['pagebreak',['pagebreak']],
        ['style', ['style']],
        ['font', ['bold', 'italic', 'underline', 'clear', 'strikethrough', 'superscript', 'subscript']],
        ['fontname', ['fontname']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['height', ['height']],
        ['table', ['table']],
        ['insert', ['link', 'picture', 'video']],
        ['view', ['fullscreen', 'codeview', 'help']],
    ],
    height: 600,
    callbacks: {
        onChange: function(contents, $editable) {
            // console.log('onChange:', contents, $editable);
            @this.set('form.belly', contents)
        }
    }
});
</script>
</div>

                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div><x-cms.label-input-text-form name="created_at" title="Tanggal Publish"/></div>
                    <div><x-cms.label-select-onoff-form/></div>
                </div>
            </div>
        </div>
        <div class="flex items-center justify-between gap-4 p-4">
            <x-cms.href-back href="{{ route('cms-posts') }}" title="Posts" awesome="fa-solid fa-reply"/>
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
