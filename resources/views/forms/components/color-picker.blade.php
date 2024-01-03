<script src="https://cdn.jsdelivr.net/npm/@jaames/iro@5"></script>

<x-dynamic-component
    :component="$getFieldWrapperView()"
    :field="$field"
>

    @php
        $width = $getWidth();
    @endphp
    <div x-data="{ state: $wire.$entangle('{{ $getStatePath() }}') }"
        x-init="
            const colorPicker = new iro.ColorPicker($refs.picker, {
                @if($width)
                width: @js($width),
                @endif
                color: state
            });
            // listen to a color picker's color:change event
            // color:change callbacks receive the current color
            colorPicker.on('color:change', function(color) {
                // log the current color as a HEX string
                state = color.hexString
            });
        "
    >
        {{ $getWidth() }}
        <div wire:ignore x-ref="picker"></div>
    </div>
</x-dynamic-component>
