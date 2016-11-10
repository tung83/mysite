@extends('front.contact.template', ['menus' => $menus, 'services' => $services
    ,'qtextFooterContact' => $qtextFooterContact, 'qtextIntroduction' => $qtextIntroduction
    , 'basicConfigs' => $basicConfigs])
@section('main')
    <div class="contact row">
    <div id="contact-header" class="row text-center">
        <h2 class="title">{{trans('front/contact.title')}}</h2>
        <p>{{ trans('front/contact.text') }}</p>
    </div>
    <div class="row">
        <div id="contact-leftside" class="col-md-6">
            <div id="contact-info">
               {!! languageTransform($qtextContact, 'content')!!}
            </div>
            <img src="{{asset('img/contact-items.png')}}" class="img-responsive" alt="" title="">
        </div>
        <div id="contact-rightside" class="col-md-6">
            @include('front.contact.partials.form')
        </div>
    </div>
    </div>
    <div class="clearfix"></div>
    <div id="contact-image-bar" class="row">
       <img src="{{asset('img/contact-banner.png')}}" class="img-responsive" alt="" title="">
    </div>
    <div id="contact-google-map" class="row">
    </div>    
@endsection
@push('javascript')
<script>
    // blog based javascript
</script>
@endpush