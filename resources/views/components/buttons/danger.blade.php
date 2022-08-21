@props(['disabled' => false])
<button {{ $disabled ? 'disabled' : '' }} {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:w-auto sm:text-sm disabled:cursor-not-allowed disabled:opacity-25 transition']) }} wire:loading.attr="disabled" wire:loading.class="opacity-50 not-allowed">
    {{ $slot }}
</button>
