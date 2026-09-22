<?php

use Illuminate\Support\Facades\Route;
use Spatie\Sitemap\SitemapGenerator;
use Illuminate\Support\Facades\Response;

Route::get('/sitemap.xml', function () {
    $sitemap = Spatie\Sitemap\Sitemap::create()
        ->add(Spatie\Sitemap\Tags\Url::create('/')->setPriority(1.0)->setChangeFrequency('daily'))
        ->add(Spatie\Sitemap\Tags\Url::create('/berita')->setPriority(0.9)->setChangeFrequency('daily'))
        ->add(Spatie\Sitemap\Tags\Url::create('/galeri/foto')->setPriority(0.8)->setChangeFrequency('weekly'))
        ->add(Spatie\Sitemap\Tags\Url::create('/galeri/video')->setPriority(0.8)->setChangeFrequency('weekly'));

    // Formulir Pelayanan Publik
    $forms = ['registrasi', 'kelahiran', 'meninggal', 'titip-warga', 'atestasi', 'pengakuan', 'pernikahan', 'baptis', 'sidi'];
    foreach ($forms as $form) {
        $sitemap->add(Spatie\Sitemap\Tags\Url::create('/form/' . $form)->setPriority(0.5)->setChangeFrequency('monthly'));
    }

    // Halaman Profil / Tentang Gereja (id_format = 1)
    $abouts = \App\Models\Post::where('id_format', 1)
        ->where('onoff', 1)
        ->get();

    foreach ($abouts as $about) {
        $sitemap->add(Spatie\Sitemap\Tags\Url::create('/tentang/' . $about->slug)->setPriority(0.7)->setChangeFrequency('monthly'));
    }

    // Semua Postingan Publik (Berita, Renungan, Warta, Foto, Video)
    $posts = \App\Models\Post::whereIn('id_format', [2, 3, 4])
        ->where('onoff', 1)
        ->where('created_at', '<=', now())
        ->with('format')
        ->orderBy('created_at', 'desc')
        ->get();

    foreach ($posts as $post) {
        $formatSlug = $post->format->slug ?? 'berita';
        $path = $formatSlug . '/' . $post->id . '/' . $post->slug;
        $sitemap->add(
            Spatie\Sitemap\Tags\Url::create($path)
                ->setLastModificationDate($post->updated_at ?? $post->created_at)
                ->setPriority(0.8)
                ->setChangeFrequency('monthly')
        );
    }

    return $sitemap->toResponse(request());
});

Route::get('/', App\Livewire\App\Home::class)->name('home');

Route::get('logout', \App\Http\Controllers\Logout::class)->name('logout');

Route::get('tentang/{slug}', App\Livewire\App\About::class);

Route::get('form/registrasi', \App\Livewire\App\FormulirRegistrasi::class);
Route::get('form/kelahiran', \App\Livewire\App\FormulirKelahiran::class);
Route::get('form/meninggal', \App\Livewire\App\FormulirMeninggal::class);
Route::get('form/titip-warga', \App\Livewire\App\FormulirTitipwarga::class);
Route::get('form/atestasi', \App\Livewire\App\FormulirAtestasi::class);
Route::get('form/pengakuan', \App\Livewire\App\FormulirPengakuan::class);
Route::get('form/pernikahan', \App\Livewire\App\FormulirNikah::class);
Route::get('form/baptis', \App\Livewire\App\FormulirBaptis::class);
Route::get('form/sidi', \App\Livewire\App\FormulirSidi::class);

Route::get('form/sent', \App\Livewire\App\FormulirSent::class)->name('form-sent');

Route::get('galeri/{slug}', App\Livewire\App\GaleriIndex::class);
Route::get('berita', App\Livewire\App\BeritaIndex::class)->name('berita');
Route::get('berita/{id}', App\Livewire\App\PostDetail::class)->name('berita-detail');
Route::get('berita/{id}/{slug}', App\Livewire\App\PostDetail::class)->name('berita-detail-slug');

Route::get('galeri-foto/{id}', App\Livewire\App\PostDetail::class);
Route::get('galeri-foto/{id}/{slug}', App\Livewire\App\PostDetail::class);
Route::get('galeri-video/{id}', App\Livewire\App\PostDetail::class);
Route::get('galeri-video/{id}/{slug}', App\Livewire\App\PostDetail::class);

Route::middleware(['auth', 'check.role1234'])->group(function () {
    Route::get('dashboard', \App\Livewire\Cms\Dashboard::class)->name('dashboard');

    Route::get('cms/posts', \App\Livewire\Cms\PostIndex::class)->name('cms-posts');
    Route::get('cms/posts/create', \App\Livewire\Cms\PostCreate::class)->name('cms-posts-create');
    Route::get('cms/posts/edit/{id}', \App\Livewire\Cms\PostEdit::class)->name('cms-posts-edit');
    Route::get('cms/posts/photos/{post_id}', \App\Livewire\Cms\PhotoIndex::class)->name('cms-posts-photos');
});

Route::middleware(['auth', 'check.role12'])->group(function () {
    Route::get('cms/categories', \App\Livewire\Cms\CategoryIndex::class)->name('cms-categories');

    Route::get('cms/forms', \App\Livewire\Cms\FormulirIndex::class)->name('cms-forms');

    Route::get('cms/forms/registrasi', \App\Livewire\Cms\RegistrasiIndex::class)->name('cms-forms-registrasi');
    Route::get('cms/forms/kelahiran', \App\Livewire\Cms\KelahiranIndex::class)->name('cms-forms-kelahiran');
    Route::get('cms/forms/meninggal', \App\Livewire\Cms\MeninggalIndex::class)->name('cms-forms-meninggal');
    Route::get('cms/forms/titip-warga', \App\Livewire\Cms\TitipwargaIndex::class)->name('cms-forms-titip-warga');
    Route::get('cms/forms/atestasi', \App\Livewire\Cms\AtestasiIndex::class)->name('cms-forms-atestasi');
    Route::get('cms/forms/pengakuan', \App\Livewire\Cms\PengakuanIndex::class)->name('cms-forms-pengakuan');
    Route::get('cms/forms/pernikahan', \App\Livewire\Cms\PernikahanIndex::class)->name('cms-forms-pernikahan');
    Route::get('cms/forms/baptis', \App\Livewire\Cms\BaptisIndex::class)->name('cms-forms-baptis');
    Route::get('cms/forms/sidi', \App\Livewire\Cms\SidiIndex::class)->name('cms-forms-sidi');

    // Route::get('cms/forms/create', \App\Livewire\Cms\FormulirIndex::class)->name('cms-forms-create');
    // Route::get('cms/forms/edit/{id}', \App\Livewire\Cms\FormulirIndex::class)->name('cms-forms-edit');
    Route::get('cms/formformats', \App\Livewire\Cms\FormulirFormatIndex::class)->name('cms-formformats');
    Route::get('cms/formformats/create', \App\Livewire\Cms\FormulirFormatIndex::class)->name('cms-formformats-create');
    Route::get('cms/formformats/edit/{id}', \App\Livewire\Cms\FormulirFormatIndex::class)->name('cms-formformats-edit');
    Route::get('cms/people', \App\Livewire\Cms\PersonIndex::class)->name('cms-people');
    Route::get('cms/people/create', \App\Livewire\Cms\PersonCreate::class)->name('cms-people-create');
    Route::get('cms/people/edit/{id}', \App\Livewire\Cms\PersonEdit::class)->name('cms-people-edit');

    Route::middleware(['auth', 'check.role12'])->group(function () {
        Route::get('cms/homeslide', \App\Livewire\Cms\HomeSlideIndex::class)->name('cms-homeslide');
        Route::get('cms/homeslide/create', \App\Livewire\Cms\HomeSlideCreate::class)->name('cms-homeslide-create');
        Route::get('cms/homeslide/edit/{id}', \App\Livewire\Cms\HomeSlideEdit::class)->name('cms-homeslide-edit');
    });
});

Route::middleware(['auth', 'check.role1'])->group(function () {
    Route::get('cms/users', \App\Livewire\Cms\UserIndex::class)->name('cms-users');
    Route::get('cms/users/create', \App\Livewire\Cms\UserCreate::class)->name('cms-users-create');
    Route::get('cms/users/edit/{id}', \App\Livewire\Cms\UserEdit::class)->name('cms-users-edit');
    Route::get('cms/users/password/reset/{id}', \App\Livewire\Cms\UserPasswordReset::class)->name('cms-users-password-reset');
});

Route::middleware('auth')->group(function () {
    Route::get('cms/account/edit', \App\Livewire\Cms\AccountEdit::class)->name('cms-account-edit');
    Route::get('cms/account/password/reset', \App\Livewire\Cms\AccountPasswordReset::class)->name('cms-account-password-reset');
});

Route::middleware('guest')->group(function () {
    Route::get('login', \App\Livewire\Guest\Login::class)->name('login');
    Route::get('register', \App\Livewire\Guest\Register::class)->name('register');
    // Route::post('auth/redirect', [App\Http\Controllers\Authgoogle::class, 'redirect'])->name('auth-redirect');
    // Route::get('auth/callback', [App\Http\Controllers\Authgoogle::class, 'callback'])->name('auth-callback');
});

Route::get('images/{filename}', function ($filename) {
    $path = storage_path('app/private/images/'.basename($filename));
    if (! file_exists($path)) {
        abort(404);
    }

    return response()->file($path, ['Cache-Control' => 'public, max-age=604800']);
})->name('images');

Route::get('images/small/{filename}', function ($filename) {
    $path = storage_path('app/private/small/'.basename($filename));
    if (! file_exists($path)) {
        abort(404);
    }

    return response()->file($path, ['Cache-Control' => 'public, max-age=604800']);
})->name('images-small');

Route::get('images/medium/{filename}', function ($filename) {
    $path = storage_path('app/private/medium/'.basename($filename));
    if (! file_exists($path)) {
        abort(404);
    }

    return response()->file($path, ['Cache-Control' => 'public, max-age=604800']);
})->name('images-medium');

Route::get('images/large/{filename}', function ($filename) {
    $path = storage_path('app/private/large/'.basename($filename));
    if (! file_exists($path)) {
        abort(404);
    }

    return response()->file($path, ['Cache-Control' => 'public, max-age=604800']);
})->name('images-large');

Route::get('images/ori/{filename}', function ($filename) {
    $path = storage_path('app/private/original/'.basename($filename));
    if (! file_exists($path)) {
        abort(404);
    }

    return response()->file($path, ['Cache-Control' => 'public, max-age=604800']);
})->name('images-ori');

Route::get('images/homeslide/{filename}', function ($filename) {
    $path = storage_path('app/private/homeslide/'.basename($filename));

    if (! file_exists($path)) {
        abort(404);
    }

    return response()->file($path, ['Cache-Control' => 'public, max-age=604800']);
})->name('images-homeslide');
