@extends('front.frontTemplate', ['title'=>$title, 'menus' => $menus, 'serviceCategories' => $serviceCategories
    ,'qtextFooterContact' => $qtextFooterContact, 'qtextIntroduction' => $qtextIntroduction
    , 'basicConfigs' => $basicConfigs])
@section('main')
    @include('front.news.partials.news-item', ['news'=> $news])
@endsection
