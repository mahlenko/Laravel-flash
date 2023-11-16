@props(['namespace' => null, 'type' => null])
@php($flash = flash_messages($type, $namespace))

@if ($flash->length)
    <div class="{{ config('flash.classes.base') }} {{ config('flash.classes.individual')[$flash->type] }}">
        @if($flash->title)<p class="{{ config('flash.classes.title') }}"></p>@endif
        <ul class="{{ config('flash.classes.list') }}">
            @foreach($flash->messages as $message)
                <li class="{{ config('flash.classes.item') }}">{{ $message }}</li>
            @endforeach
        </ul>
    </div>
@endif
