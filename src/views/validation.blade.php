@if ($errors->count())
  <div class="{{ config('flash.classes.base') }} {{ config('flash.classes.individual')[config('flash.classes.validation')] }}">
    <ul class="{{ config('flash.classes.list') }}">
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif
