@extends('front.project.template', ['menus' => $menus, 'services' => $services
    ,'qtextFooterContact' => $qtextFooterContact, 'qtextIntroduction' => $qtextIntroduction
    , 'basicConfigs' => $basicConfigs])
@section('main')
    @include('front.project.partials.projects', ['projectCategories' => $projectCategories, 'projects'=> $projects])
@endsection
