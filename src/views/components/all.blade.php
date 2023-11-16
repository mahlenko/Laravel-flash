@props([
  'namespace' => null,
  'view' => config('flash.views.messages'),
  'validation' => config('flash.views.validation')
])

<div {{ $attributes }}>
  @foreach(\Makhlenko\LaravelFlash\enums\LaravelFlashType::cases() as $case)
    <x-flash::messages :namespace="$namespace" :type="$case" :view="$view" />
  @endforeach

  <x-flash::validation :view="$validation" />
</div>
