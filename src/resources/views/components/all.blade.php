@props([
  'namespace' => null,
  'view' => config('flash.messages.view'),
  'view-validation' => config('flash.validations.view')
])

<div {{ $attributes }}>
  <x-flash::messages :namespace="$namespace" :view="$view" />

  @if (config('flash.validations.enabled'))
    <x-flash::validations :view="$view_validation" />
  @endif
</div>
