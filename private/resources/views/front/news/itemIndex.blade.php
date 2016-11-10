@extends('front.news.template', ['menus' => $menus, 'services' => $services
    ,'qtextFooterContact' => $qtextFooterContact, 'qtextIntroduction' => $qtextIntroduction
    , 'basicConfigs' => $basicConfigs])
@section('main')
    @include('front.news.partials.news-item', ['news'=> $news])
@endsection
