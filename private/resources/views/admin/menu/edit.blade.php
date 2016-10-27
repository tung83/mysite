@extends('admin.menu.template')

@section('form')
    {!! Form::model($menu, ['route' => ['admin.page.update', $menu->id], 'method' => 'put']) !!}
@endsection
