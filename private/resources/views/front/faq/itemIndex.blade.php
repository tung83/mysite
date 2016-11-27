@extends('front.frontTemplate', compact('currentMenu', 'serviceMenu', 'menus', 'services','qtextFooterContact','qtextIntroduction','basicConfigs'))

@section('main')
    @include('front.faq.partials.faq-item', ['faq'=> $faq])
@endsection
