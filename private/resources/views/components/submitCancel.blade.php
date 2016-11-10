<div class="form-group {{ $class }}"> 
    {!! Form::submit($value, ['class' => 'btn btn-primary']) !!}
    {{ HTML::link($cancelLink, $cancelText, ['class' => 'btn btn-warning btn-close'])}}
</div>

