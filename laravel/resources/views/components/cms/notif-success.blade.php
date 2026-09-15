@props(['message'])

<input type="checkbox" id="notif-checkbox" class="notif-checkbox">
<div class="z-50 flex items-center gap-3 py-2 pl-3 pr-3 transition border border-l-8 rounded notification border-emerald-500 bg-emerald-100 text-emerald-500" role="alert">
    <i class="text-xl fa-regular fa-circle-check"></i>
    <span class="text-sm leading-tight text-left text-emerald-600">{{ $message }}</span>
    <label for="notif-checkbox" class="cursor-pointer fa-solid fa-xmark"></label>
</div>

<style>
.notification {
    /* position: absolute; */
    position: fixed;
    top: 10px;
    right: 10px;
    animation: slideIn 0.5s ease forwards 0s, slideOut 0.5s ease forwards 5s;
}

.notif-checkbox {
    display: none;
}

.notif-checkbox:checked ~ .notification {
    animation: slideOut 0.5s ease forwards 0s;
}

@keyframes slideIn {
    from {
        transform: translateY(-130%);
    }
    to {
        transform: translateY(0);
    }
}

@keyframes slideOut {
    from {
        transform: translateY(0);
    }
    to {
        transform: translateY(-130%);
    }
}

</style>
