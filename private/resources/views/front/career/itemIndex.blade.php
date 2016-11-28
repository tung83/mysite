@extends('front.frontTemplate', compact('currentMenu', 'serviceMenu', 'menus', 'services','qtextFooterContact','qtextIntroduction','basicConfigs'))

@section('main')
    @include('front.career.partials.career-item', ['career'=> $career])
@endsection
