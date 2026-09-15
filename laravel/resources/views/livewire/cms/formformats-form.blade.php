<div class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="fixed inset-0 transition-opacity bg-opacity-75 bg-slate-300" aria-hidden="true"></div>

    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex items-center justify-center min-h-full p-4">
            <div class="relative overflow-hidden text-left transition-all transform bg-white shadow-md rounded-xl sm:my-8 sm:w-full sm:max-w-sm">
                <form wire:submit="store()" class="flex flex-col divide-y">
                    <div class="flex items-center justify-center py-3">
                        <x-cms.page-title title="{{ $formformat_id ? 'Edit Format Formulir' : 'Tambah Format Formulir' }}"/>
                    </div>
                    <div class="flex flex-col gap-4 p-4 bg-slate-50">
                        <x-cms.label-input-text name="title" title="Nama Format Formulir"/>
                        <x-cms.label-input-text name="slug" title="Slug Format Formulir"/>
                        <x-cms.label-input-text name="description" title="Deskripsi"/>
                    </div>
                    <div class="flex items-end justify-between px-4 py-3 bg-white">
                        <x-cms.button-cancel closeModal="closeModal"/>
                        <x-cms.button-save title="Simpan"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
