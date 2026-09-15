@section('page_title', 'Form')
<div class="grow flex justify-center items-center gap-2">
<x-app.form-menu-a href="{{ url('form-registrasi') }}" title="Pengajuan Registrasi"/>
<x-app.form-menu-a href="{{ route('form-kelahiran') }}" title="Kelahiran"/>
<x-app.form-menu-a href="{{ route('form-meninggal') }}" title="Meninggal"/>
<x-app.form-menu-a href="{{ route('form-titip-warga') }}" title="Titip Warga"/>
<x-app.form-menu-a href="{{ route('form-atestasi') }}" title="Atestasi"/>
<x-app.form-menu-a href="{{ route('form-pengakuan') }}" title="Pengakuan Dosa"/>
<x-app.form-menu-a href="{{ route('form-pernikahan') }}" title="Pernikahan"/>
<x-app.form-menu-a href="{{ route('form-baptis') }}" title="Baptis Anak"/>
<x-app.form-menu-a href="{{ route('form-sidi') }}" title="Sidi"/>
</div>
