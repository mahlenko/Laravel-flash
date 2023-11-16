@if ($errors->count())
  <div class="{{ config('flash.classes.base') }} {{ config('flash.classes.individual')[config('flash.classes.validation')] }}">
    @if(config('flash.show_title_defaults'))
      <p class="{{ config('flash.classes.title') }}">
        {{ config('flash.titles_default.VALIDATION') }}
      </p>
    @endif
    <ul class="{{ config('flash.classes.list') }}">
      @foreach ($errors->all() as $error)
        <li class="{{ config('flash.classes.item') }}">{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif
