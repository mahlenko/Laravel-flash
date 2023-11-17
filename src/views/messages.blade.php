@props(['namespace' => null, 'type' => \Makhlenko\LaravelFlash\enums\LaravelFlashType::DEFAULT])
@php($flash = flash_messages($type, $namespace))

@if (!is_null($flash) && $flash->length)
    <div class="{{ config('flash.classes.base') }} {{ config('flash.classes.individual')[$flash->type] }}">
        {{-- title --}}
        @if($flash->title)
            <p class="{{ config('flash.classes.title') }}">
                {{ $flash->title }}
            </p>
        @elseif(config('flash.show_title_defaults'))
            <p class="{{ config('flash.classes.title') }}">
                {{ config('flash.titles_default')[$flash->type] }}
            </p>
        @endif

        {{-- messages --}}
        <ul class="{{ config('flash.classes.list') }}@if($flash->length === 1) list-none @endif">
            @foreach($flash->messages as $message)
                <li class="{{ config('flash.classes.item') }}">{{ $message }}</li>
            @endforeach
        </ul>

        {{-- Links --}}
        @if($flash->links)
            <div class="flex gap-x-2 mt-1">
                @foreach($flash->links as $link)
                    <a href="{{ $link->href }}" class="hover:underline">{{ $link->text }}</a>
                @endforeach
            </div>
        @endif
    </div>
@endif
