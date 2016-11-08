    {!! Form::open(['url' => 'menu', 'method' => 'post', 'class' => '']) !!}
        {!! Form::controlBootstrap('text', 12, 'name', $errors, trans('front/contact.name'), null, null, 'Họ tên') !!}
        {!! Form::controlBootstrap('email', 12, 'email', $errors, trans('front/contact.email')) !!}
        {!! Form::controlBootstrap('textarea', 12, 'message', $errors, trans('front/contact.message')) !!}
        {!! Form::text('address', '', ['class' => 'hpet']) !!}
        <div class="form-group has-feedback col-lg-12 ">
            {!! Recaptcha::render() !!}           
        </div>
        {!! Form::submitBootstrap(trans('front/form.send'), 'col-lg-12') !!}
  {!! Form::close() !!}
