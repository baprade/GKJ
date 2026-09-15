@props(['message'])

<input type="checkbox" id="notif-checkbox" class="notif-checkbox">
<div class="z-50 flex items-center gap-3 py-2 pl-3 pr-3 text-yellow-500 transition bg-yellow-100 border border-l-8 border-yellow-500 rounded notification" role="alert">
    <i class="text-xl fa-regular fa-triangle-exclamation"></i>
    <span class="text-sm leading-tight text-left text-yellow-600">{{ $message }}</span>
    <label for="notif-checkbox" class="cursor-pointer fa-solid fa-xmark"></label>
</div>

<style>
.notification {
    position: absolute;
    top: 10px;
    right: 10px;
    animation: fadeIn 0.5s ease forwards 0s, fadeOut 0.5s ease forwards 5s;
}

@keyframes fadeIn {
    from {
        transform: translateY(-130%);
    }
    to {
        transform: translateY(0);
    }
}

@keyframes fadeOut {
    from {
        transform: translateY(0);
    }
    to {
        transform: translateY(-130%);
    }
}

.notif-checkbox {
    display: none;
}

.notif-checkbox:checked ~ .notification {
    animation: none;
}
</style>
