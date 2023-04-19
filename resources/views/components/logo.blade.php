@props(['color'])

<div {{ $attributes(['class' => 'flex items-center']) }}>
    <img src="{{ asset('assets/images/green-ellipse.png') }}" alt="green half elippse">
    <img class="-ml-2" src="{{ asset('assets/images/yellow-ellipse.png') }}" alt="yellow full elippse">
    @if(isset($color))
        <h1 class="ml-0.5 {{ $color }} text-3xl font-semibold mb-1.5">ronatime</h1>
    @else
        <h1 class="ml-0.5 text-indigo-700 text-3xl font-semibold mb-1.5">ronatime</h1>
    @endif
</div>
