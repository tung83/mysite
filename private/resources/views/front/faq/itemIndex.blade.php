@extends('front.frontTemplate', compact('title', 'currentMenu', 'serviceMenu', 'menus', 'serviceCategories','qtextFooterContact','qtextIntroduction','basicConfigs'))

@section('main')
    @include('front.faq.partials.faq-item', ['faq'=> $faq])
@endsection
