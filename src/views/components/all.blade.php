@props([
  'namespace' => null,
  'view' => config('flash.views.messages'),
  'validation' => config('flash.views.validation')
])

<div {{ $attributes }}>
  <x-flash::messages :namespace="$namespace" :view="$view" />
  <x-flash::validation :view="$validation" />
</div>
