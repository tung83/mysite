<div class="project row">
    <div class="container">
        <div id="project-list" class="row text-center">        
            <h2 class="title">{{trans('front/site.projects')}}</h2>
        </div>
        <div id="project-category" class="row text-center ">
            <ul class="list-inline list-inline-sm">
                @foreach($projectCategories as $index => $projectCategory) 
                <li>
                    <a href="{{ url(getCategorySlugLink($projectMenu, $projectCategory)) }}"
                       class="{{ $index ==  0 ? 'active' : ''  }}">
                       {{languageTransform($projectCategory, 'title')}}  
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
        <div class="clear">
        </div>
        <div id="project-category-content" class="container">
            @include('front.home.partials.project-category',['projectMenu' => $projectMenu,'projectCategory' => $projectCategories[0],'projects' => $projects])   
        </div>
    </div>
</div>
@push('scripts')
<script>   
    /*==================== PAGINATION =========================*/
    $(document).on('click','#project-category-content .pagination a', function(e){
        e.preventDefault();        
        var valuesPart = $(this).attr('href').match(/([0-9]+)\?page=([0-9]+)$/g);  
        var values = valuesPart[0].split('?page=');
        var id = values[0];
        var page = values[1];
         getProjects(id, page);
    });

    function getProjects(id, page){
        $.ajax({
            url: '{{ url('/ajax/homeProjects') }}' + '?pId=' + id + '&page=' + page,
            type: 'GET'
        }).done(function(data){
                $('#project-rightside').html(data);
        })
        .fail(function() {                            
        });
    }

    $(document).on('click','#project-category .list-inline a', function(e){
        e.preventDefault();                
        $('#project-category .list-inline a').removeClass('active');
        $(this).addClass('active'); 
        var id = $(this).attr('href').match(/([0-9]+)$/g)[0]; 
        getProjectsCategory(id);
    });

    function getProjectsCategory(id){
        $.ajax({
            url: '{{ url('/ajax/homeProjects') }}' + '?pId=' + id,
            type: 'GET'
        }).done(function(data){
                $('#project-category-content').html(data);
        })
        .fail(function() {                            
        });
    };
</script>
@endpush