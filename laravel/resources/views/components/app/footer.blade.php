<div id="footer" class="flex flex-col items-center gap-4">
    <div class="text-sm text-center">
        <div>Jl. Murtipranoto No. 92</div>
        <div>Sanggrahan Wonogiri 57612</div>
        <div>Telp./Fax. 0273-3201137 Wonogiri</div>
    </div>
    <div class="flex justify-center">
        <x-app.footer-social-href href="https://wa.me/6287736136977" icon="whatsapp"/>
        <x-app.footer-social-href href="https://www.facebook.com/GerejaKristenJawaWonogiri/" icon="facebook"/>
        <x-app.footer-social-href href="https://www.instagram.com/gkj_wonogiri/" icon="instagram"/>
        <x-app.footer-social-href href="#" icon="x"/>
        <x-app.footer-social-href href="https://www.youtube.com/c/GKJWONOGIRI" icon="youtube"/>
        <x-app.footer-social-href href="#" icon="tiktok"/>
    </div>
    <div class="text-xs text-center">
        <div>&#169; {{ date("Y") }} {{ config('app.name') }}</div>
        <div>All Rights Reserved</div>
        <div><a href="{{ route('dashboard') }}" target="_blank">Dashboard</a></div>
    </div>
</div>
