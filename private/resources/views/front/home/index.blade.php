@extends('front.home.template', ['menus' => $menus, 'services' => $services
    ,'qtextContact' => $qtextContact, 'qtextIntroduction' => $qtextIntroduction
    , 'basicConfigs' => $basicConfigs])
@section('main')
    @include('front.home.partials.services', ['services' => $services])
    @include('front.home.partials.projects', ['projectCategories' => $projectCategories, 'projects'=> $projects])
    @include('front.home.partials.news', ['newsCategories' => $newsCategories, 'news'=> $news])
    @include('front.home.partials.faqs', ['faqs'=> $faqs])
    @include('front.home.partials.recruits', ['recruits' => $recruits, 'qtextRecruit' => $qtextRecruit])
    @include('front.home.partials.customers',['customers' => $customers])
@endsection
