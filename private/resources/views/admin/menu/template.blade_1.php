@extends('admin.layout.main')

@section('head')

    {!! HTML::style('ckeditor/plugins/codesnippet/lib/highlight/styles/default.css') !!}

@endsection

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
                            <div class="form-group checkbox pull-right">
                <label>
                    {!! Form::checkbox('active') !!}
                    {{ trans('back/blog.published') }}
                </label>
            </div>

            {!! Form::controlBootstrap('text', 0, 'title', $errors, trans('back/blog.title')) !!}

            <div class="form-group {!! $errors->has('slug') ? 'has-error' : '' !!}">
                {!! Form::label('slug', trans('back/blog.permalink'), ['class' => 'control-label']) !!}
                {!! url('/') . '/blog/' . Form::text('slug', null, ['id' => 'permalink']) !!}
                <small class="text-danger">{!! $errors->first('slug') !!}</small>
            </div>
<small class="label pull-right bg-green">SEO</small>
            {!! Form::controlBootstrap('text', 0, 'summary', $errors, trans('back/blog.summary')) !!}
            {!! Form::controlBootstrap('textarea', 0, 'content', $errors, trans('back/blog.content')) !!}
            {!! Form::controlBootstrap('text', 0, 'tags', $errors, trans('back/blog.tags'), isset($tags)? implode(',', $tags) : '') !!}

              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="english">               
              </div>
              <!-- /.tab-pane -->

            </div>
            <!-- /.tab-content -->
          </div>
    <div>


            {!! Form::submitBootstrap(trans('front/form.send')) !!}

        {!! Form::close() !!}
    </div>

@endsection

@push('scripts')

    {!! HTML::script('admin/plugins/ckeditor/ckeditor.js') !!}

    <script>

        var config = {
            codeSnippet_theme: 'Monokai',
            language: '{{ config('app.locale') }}',
            height: 100,
            filebrowserBrowseUrl: '/elfinder/ckeditor',
            toolbarGroups: [
                {name: 'clipboard', groups: ['clipboard', 'undo']},
                {name: 'editing', groups: ['find', 'selection', 'spellchecker']},
                {name: 'links'},
                {name: 'insert'},
                {name: 'forms'},
                {name: 'tools'},
                {name: 'document', groups: ['mode', 'document', 'doctools']},
                {name: 'others'},
                //'/',
                {name: 'basicstyles', groups: ['basicstyles', 'cleanup']},
                {name: 'paragraph', groups: ['list', 'indent', 'blocks', 'align', 'bidi']},
                {name: 'styles'},
                {name: 'colors'}
            ]
        };

        CKEDITOR.replace('summary', config);

        config['height'] = 400;

        CKEDITOR.replace('content', config);

        function removeAccents(str) {
            var accent = [
                /[\300-\306]/g, /[\340-\346]/g, // A, a
                /[\310-\313]/g, /[\350-\353]/g, // E, e
                /[\314-\317]/g, /[\354-\357]/g, // I, i
                /[\322-\330]/g, /[\362-\370]/g, // O, o
                /[\331-\334]/g, /[\371-\374]/g, // U, u
                /[\321]/g, /[\361]/g, // N, n
                /[\307]/g, /[\347]/g // C, c
            ];
            var noaccent = ['A', 'a', 'E', 'e', 'I', 'i', 'O', 'o', 'U', 'u', 'N', 'n', 'C', 'c'];
            for (var i = 0; i < accent.length; ++i) {
                str = str.replace(accent[i], noaccent[i]);
            }
            return str;
        }

        $("#title").keyup(function () {
            var str = removeAccents($(this).val())
                .replace(/[^a-zA-Z0-9\s]/g, "")
                .toLowerCase()
                .replace(/\s/g, '-');
            $("#permalink").val(str);
        });

    </script>

@endpush