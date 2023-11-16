@props([
  'namespace' => null,
  'view' => config('flash.messages.view') ?? 'flash::messages',
  'validation' => config('flash.validations.view') ?? 'flash::validations'
])

<div {{ $attributes }}>
  <x-flash::messages :namespace="$namespace" :view="$view" />

  @if (config('flash.validations.enabled'))
    <x-flash::validations :view="$validation" />
  @endif
</div>
