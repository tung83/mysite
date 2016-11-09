<div class="form-group has-feedback {{ $columns == 0 ? '': 'col-lg-' . $columns }} {{ $errors->has($name) ? 'has-error' : '' }}">
     
    @if($label)
        {!! Form::label($name, $label, ['class' => 'control-label']) !!}
    @endif
    @if($pop)
        <a href="#" tabindex="0" class="badge pull-right" data-toggle="popover" data-trigger="focus" title="' . $pop[0] .'" data-content="' . $pop[1] . '"><span>?</span></a>
    @endif
    <?php 
        $properties = array();
        $properties['class'] = 'form-control';
        if($required){
            $properties['required'] = $required;
            $placeholder .= "*";
        }
        $properties['placeholder'] = $placeholder;
    ?>
    @if($type == 'textarea')
        {!! Form::textarea($name, $value, $properties) !!} 
    @else
        {!! Form::input($type, $name, $value, $properties) !!} 
    @endif
    @if($icon)
        <span class="{{$icon}} form-control-feedback"></span>
    @endif
    {!! $errors->first($name, '<small class="help-block">:message</small>') !!}           
</div>

