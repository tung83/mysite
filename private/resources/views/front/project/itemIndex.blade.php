@extends('front.frontTemplate', compact('title', 'currentMenu', 'serviceMenu', 'menus', 'serviceCategories','qtextFooterContact','qtextIntroduction','basicConfigs'))

@section('main')
    @include('front.project.partials.project-item', ['project'=> $project])
@endsection
