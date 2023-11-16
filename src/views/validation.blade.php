@if ($errors->count())
  <div class="{{ config('flash.classes.base') }} {{ config('flash.classes.individual')[config('flash.classes.validation')] }}">
    @if(config('flash.show_title_defaults'))
      <p class="{{ config('flash.classes.title') }}">
        {{ config('flash.titles_default')[$flash->$type] }}
      </p>
    @endif
    <ul class="{{ config('flash.classes.list') }}">
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif
