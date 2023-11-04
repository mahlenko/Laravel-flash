<div {{ $attributes }}>
  <x-flash::messages />

  @if (config('flash.validations.enabled'))
    <x-flash::validations />
  @endif
</div>
