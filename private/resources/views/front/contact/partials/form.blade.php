<div class="form-group has-feedback col-lg-12 ">
    <p>{{ trans('front/contact.fillOut') }}</p>
</div>
{!! Form::open(['url' => 'contact', 'method' => 'post', 'class' => '','id' => 'form-contact-post']) !!}
    {!! Form::controlBootstrap('text', 12, 'fullName', $errors, null, null, null, trans('front/contact.fullName'), 'required') !!}
    {!! Form::controlBootstrap('text', 12, 'company', $errors, null, null, null, trans('front/contact.companyName'), 'required') !!}
    {!! Form::controlBootstrap('text', 12, 'address', $errors, null, null, null, trans('front/contact.address'), 'required') !!}
    {!! Form::controlBootstrap('text', 12, 'phone', $errors, null, null, null, trans('front/contact.phone'), 'required') !!}
    {!! Form::controlBootstrap('text', 12, 'fax', $errors, null, null, null, trans('front/contact.fax')) !!}
    {!! Form::controlBootstrap('email', 12, 'email', $errors, null, null, null, trans('front/contact.email'),'required') !!}
    {!! Form::controlBootstrap('text', 12, 'department', $errors, null, null, null, trans('front/contact.department')) !!}
    {!! Form::controlBootstrap('textarea', 12, 'content', $errors, null, null, null, trans('front/contact.content'),'required') !!}
    <div class="form-group has-feedback col-lg-12 ">
        {!! Recaptcha::render() !!}           
    </div>
    {!! Form::submitResetBootstrap(trans('front/contact.send'), 'col-lg-12', trans('front/contact.reset')) !!}
{!! Form::close() !!}
@push('scripts')
<script>
$(function() {
    $('form input').keyup(function() {

        var empty = false;
        $('form input').each(function() {
            var attr = $(this).attr('required');
            if (typeof attr !== typeof undefined && attr !== false && $(this).val() == '' ) {
                empty = true;
            }
        });
        if(empty == false)
        {
            $('form textarea').each(function() {
                var attr = $(this).attr('required');
                if (typeof attr !== typeof undefined && attr !== false && $(this).val() == '' ) {
                    empty = true;
                }
            });
        }

        if (empty) {
            $('.submit-button').addClass('disabled'); // updated according to http://stackoverflow.com/questions/7637790/how-to-remove-disabled-attribute-with-jquery-ie
        } else {
            $('.submit-button').removeClass('disabled'); // updated according to http://stackoverflow.com/questions/7637790/how-to-remove-disabled-attribute-with-jquery-ie
        }
    });
});
</script>
@endpush

