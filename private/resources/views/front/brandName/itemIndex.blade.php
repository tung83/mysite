@extends('front.frontTemplate', compact('currentMenu', 'serviceMenu', 'menus', 'services','qtextFooterContact','qtextIntroduction','basicConfigs'))

@section('main')
    @include('front.service.partials.service-item', ['service'=> $service])
@endsection
