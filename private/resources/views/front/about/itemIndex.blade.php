@extends('front.frontTemplate', compact('title', 'currentMenu', 'serviceMenu', 'menus', 'serviceCategories','qtextFooterContact','qtextIntroduction','basicConfigs'))

@section('main')
    @include('front.about.partials.about-item', ['about'=> $about])
@endsection
