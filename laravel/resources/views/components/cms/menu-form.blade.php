<div class="flex flex-wrap justify-center w-full gap-1 p-1 bg-white shadow">
    <x-cms.menu-form-a href="{{ route('cms-forms-registrasi') }}" title="Registrasi" :active="request()->routeIs('cms-forms-registrasi')"/>
    <x-cms.menu-form-a href="{{ route('cms-forms-kelahiran') }}" title="Kelahiran" :active="request()->routeIs('cms-forms-kelahiran')"/>
    <x-cms.menu-form-a href="{{ route('cms-forms-meninggal') }}" title="Meninggal" :active="request()->routeIs('cms-forms-meninggal')"/>
    <x-cms.menu-form-a href="{{ route('cms-forms-titip-warga') }}" title="Titip Warga" :active="request()->routeIs('cms-forms-titip-warga')"/>
    <x-cms.menu-form-a href="{{ route('cms-forms-atestasi') }}" title="Atestasi" :active="request()->routeIs('cms-forms-atestasi')"/>
    <x-cms.menu-form-a href="{{ route('cms-forms-pengakuan') }}" title="Pengakuan" :active="request()->routeIs('cms-forms-pengakuan')"/>
    <x-cms.menu-form-a href="{{ route('cms-forms-pernikahan') }}" title="Pernikahan" :active="request()->routeIs('cms-forms-pernikahan')"/>
    <x-cms.menu-form-a href="{{ route('cms-forms-baptis') }}" title="Baptis" :active="request()->routeIs('cms-forms-baptis')"/>
    <x-cms.menu-form-a href="{{ route('cms-forms-sidi') }}" title="Sidi" :active="request()->routeIs('cms-forms-sidi')"/>
</div>
