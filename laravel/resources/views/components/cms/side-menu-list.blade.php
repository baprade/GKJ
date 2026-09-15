<x-cms.aside-href-home/>

<x-cms.aside-href href="{{ route('dashboard') }}" title="Dashboard" awesome="fa-solid fa-chart-simple" :active="request()->routeIs('dashboard')"/>

@if (Auth()->user()->id_role == 1)
<x-cms.aside-href href="{{ route('cms-people') }}" title="Jemaat" awesome="fa-solid fa-users" :active="request()->routeIs('cms-people') || request()->routeIs('cms-people-create') || request()->routeIs('cms-people-edit')"/>
@endif

<x-cms.aside-href href="{{ route('cms-forms') }}" title="Formulir" awesome="fa-solid fa-file-arrow-down" :active="request()->routeIs('cms-forms') || request()->routeIs('cms-forms-edit')"/>
<x-cms.aside-href href="{{ route('cms-formformats') }}" title="Format Form" awesome="fa-solid fa-folder-closed" :active="request()->routeIs('cms-formformats') || request()->routeIs('cms-formformats-edit')"/>
<x-cms.aside-href href="{{ route('cms-posts') }}" title="Posts" awesome="fa-solid fa-newspaper" :active="request()->routeIs('cms-posts') || request()->routeIs('cms-posts-create') || request()->routeIs('cms-posts-edit')"/>

@if ((Auth()->user()->id_role == 1) || (Auth()->user()->id_role == 2))
<x-cms.aside-href href="{{ route('cms-homeslide') }}" title="HomeSlide" awesome="fa-solid fa-images" :active="request()->routeIs('cms-homeslide') || request()->routeIs('cms-homeslide-create') || request()->routeIs('cms-homeslide-edit')"/>
@endif

<x-cms.aside-href href="{{ route('cms-categories') }}" title="Kategori" awesome="fa-solid fa-sliders" :active="request()->routeIs('cms-categories')"/>

@if (Auth()->user()->id_role == 1)
<x-cms.aside-href href="{{ route('cms-users') }}" title="Users" awesome="fa-solid fa-user-group" :active="request()->routeIs('cms-users') || request()->routeIs('cms-users-create') || request()->routeIs('cms-users-edit') || request()->routeIs('cms-users-password-reset')"/>
@endif
