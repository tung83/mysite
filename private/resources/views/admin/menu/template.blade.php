@extends('admin.layout.main')

@section('main')

    @include('back.partials.entete', ['title' => trans('back/blog.dashboard'), 'icon' => 'pencil', 'fil' => link_to('blog', trans('back/blog.posts')) . ' / ' . trans('back/blog.creation')])

    @yield('form')
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#vietnamese" data-toggle="tab">Tiếng Việt</a></li>
            <li><a href="#english" data-toggle="tab">Tiếng Anh</a></li>
        </ul>
        <div class="tab-content">
            <div class="active tab-pane" id="vietnamese">
                {!! Form::controlBootstrap('text', 0, 'title', $errors, trans('admin/menu.title')) !!}
                <small class="label pull-right bg-green">SEO</small>
                {!! Form::controlBootstrap('text', 0, 'meta_keyword', $errors, trans('admin/menu.keyword')) !!}
                <small class="label pull-right bg-green">SEO</small>
                {!! Form::controlBootstrap('textarea', 0, 'meta_description', $errors, trans('admin/menu.description')) !!}
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="english">        
                {!! Form::controlBootstrap('text', 0, 'e_title', $errors, trans('admin/menu.title')) !!}
                <small class="label pull-right bg-green">SEO</small>
                {!! Form::controlBootstrap('text', 0, 'e_meta_keyword', $errors, trans('admin/menu.keyword')) !!}
                <small class="label pull-right bg-green">SEO</small>
                {!! Form::controlBootstrap('textarea', 0, 'e_meta_description', $errors, trans('admin/menu.description')) !!}       
            </div>
          <!-- /.tab-pane -->

        </div>
    <!-- /.tab-content -->
    </div>
    <div>        
        {!! Form::submitCancelBootstrap(trans('admin/form.save'), '', route('admin.page'), trans('admin/form.cancel')) !!}
        {!! Form::close() !!}
    </div>

@endsection
