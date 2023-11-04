@if ($errors->count())
  <ul {{ $attributes->merge([
    'class' => collect([
        config('flash.messages.base_classes'),
        \Makhlenko\LaravelFlash\LaravelFlash::validationClass()
       ])->join(' ') ]) }}>
    @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
  </ul>
@endif
