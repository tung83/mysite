{!! Form::open(['url' => 'contact', 'method' => 'post', 'class' => '']) !!}
    {!! Form::controlBootstrap('text', 12, 'fullName', $errors, null, null, null, trans('front/contact.fullName'), 'required') !!}
    {!! Form::controlBootstrap('text', 12, 'company', $errors, null, null, null, trans('front/contact.companyName'), 'required') !!}
    {!! Form::controlBootstrap('text', 12, 'address', $errors, null, null, null, trans('front/contact.address'), 'required') !!}
    {!! Form::controlBootstrap('text', 12, 'phone', $errors, null, null, null, trans('front/contact.phone'), 'required') !!}
    {!! Form::controlBootstrap('text', 12, 'fax', $errors, null, null, null, trans('front/contact.fax')) !!}
    {!! Form::controlBootstrap('email', 12, 'email', $errors, null, null, null, trans('front/contact.email'),'required') !!}
    {!! Form::controlBootstrap('email', 12, 'department', $errors, null, null, null, trans('front/contact.department')) !!}
    {!! Form::controlBootstrap('textarea', 12, 'message', $errors, null, null, null, trans('front/contact.message'),'required') !!}
    <div class="form-group has-feedback col-lg-12 ">
        {!! Recaptcha::render() !!}           
    </div>
    {!! Form::submitBootstrap(trans('front/form.send'), 'col-lg-12') !!}
{!! Form::close() !!}
