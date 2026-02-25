@props(['status' => 'pending'])

@php
    $classes = 'inline-block rounded-full border px-2 py-1 text-xs font-medium';

    $status_styles = [
        'pending' => ' bg-yellow-500/10 text-yellow-500 border-yellow-500/20',
        'in_progress' => ' bg-blue-500/10 text-blue-500 border-blue-500/20',
        'completed' => ' bg-primary/10 text-primary border-primary/20',
    ];

    $classes .= $status_styles[$status] ?? '';
@endphp

<span {{ $attributes(['class' => $classes]) }}>
    {{ $slot }}
</span>
