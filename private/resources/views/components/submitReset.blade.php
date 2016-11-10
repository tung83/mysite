<div class="form-group {{ $class }}"> 
    {!! Form::submit($value, ['class' => 'btn btn-primary submit-button disabled']) !!}
    {{ Form::reset($resetText, ['class' => 'btn btn-primary']) }}  
</div>

