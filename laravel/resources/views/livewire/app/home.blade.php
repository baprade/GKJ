<div class="grow">
    <x-app.home.hero :homeslide="$homeslide"/>
    <x-app.home.about/>
    <div class="flex flex-col gap-8 py-8">
        <x-app.home.news :news="$news"/>
        <x-app.home.gallery :photos="$photos" :videos="$videos"/>
    </div>
</div>
