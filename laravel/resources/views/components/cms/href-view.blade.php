@props(['href'])

<a href="{{ $href }}" target="_blank"
    class="
        inline-flex justify-center items-center
        w-8 h-8
        rounded-full
        border
        bg-white
        text-sky-600
        border-sky-500
        hover:bg-sky-500
        hover:text-white
    "
><i class="fa-solid fa-eye"></i></a>
