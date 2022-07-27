@props(['for', 'description' => null])

@error($for)
    <p {{ $attributes->merge(['class' => 'block text-xs font-medium text-red-600']) }}>{{ $message }}</p>
@enderror

@if (!$errors->has($for) && $description)
    <p {{ $attributes->merge(['class' => 'block text-xs font-medium text-gray-500']) }}>
        {{ $description }}
    </p>
@endif