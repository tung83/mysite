@extends('front.frontTemplate', compact('currentMenu', 'serviceMenu', 'menus', 'services','qtextFooterContact','qtextIntroduction','basicConfigs'))

@section('main')
    @include('front.project.partials.project-item', ['project'=> $project])
@endsection
