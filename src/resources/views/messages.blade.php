@props(['namespace' => null])

@php($flash = \Makhlenko\LaravelFlash\LaravelFlash::all($namespace))

@if ($flash->count())
  @foreach ($flash as $type => $messages)
    <ul class="{{ config('flash.messages.base_classes') }} {{ config('flash.messages.classes')[$type] }}">
      @foreach ($messages as $message)
      <li>{{ $message }}</li>
      @endforeach
    </ul>
  @endforeach
@endif
