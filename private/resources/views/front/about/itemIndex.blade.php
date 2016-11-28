@extends('front.frontTemplate', compact('currentMenu', 'serviceMenu', 'menus', 'services','qtextFooterContact','qtextIntroduction','basicConfigs'))

@section('main')
    @include('front.about.partials.about-item', ['about'=> $about])
@endsection
