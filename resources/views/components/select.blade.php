@props(['disabled' => false, 'options' => []])

<select {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'block  py-2 text-sm w-full text-gray-900 border-gray-300 focus:ring-blue-500 focus:border-blue-500 rounded-md shadow-sm']) !!}>
    {{ $slot }}
</select>