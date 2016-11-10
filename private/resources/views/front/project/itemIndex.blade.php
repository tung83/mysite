@extends('front.project.template', ['menus' => $menus, 'services' => $services
    ,'qtextFooterContact' => $qtextFooterContact, 'qtextIntroduction' => $qtextIntroduction
    , 'basicConfigs' => $basicConfigs])
@section('main')
    @include('front.project.partials.project-item', ['project'=> $project])
@endsection
