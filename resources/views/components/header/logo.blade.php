@props(['color'])

<div {{ $attributes(['class' => 'flex items-center']) }}>
    <x-header.green-ellipse-svg />
    <x-header.yellow-ellipse-svg />
    @if(isset($color))
        <h1 class="ml-0.5 {{ $color }} text-3xl font-semibold mb-1.5">ronatime</h1>
    @else
        <h1 class="ml-0.5 text-blue text-3xl font-semibold mb-1.5">ronatime</h1>
    @endif
</div>
