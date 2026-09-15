@props(['onoff'])

@if ($onoff == 1)
<div
    class="
        flex justify-center items-center
        w-8 h-8 mx-auto
        rounded-full
        bg-green-500
        text-white
    "
>
<i class="fa-solid fa-power-off text-sm"></i></div>
@endif

@if ($onoff == 0)
<div
    class="
        flex justify-center items-center
        w-8 h-8 mx-auto
        rounded-full
        bg-red-500
        text-white
    "
>
<i class="fa-solid fa-power-off text-sm"></i></div>
@endif
