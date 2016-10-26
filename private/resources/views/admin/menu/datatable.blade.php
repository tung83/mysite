@extends('admin.layout.main')
@section('head')
  <!-- DataTables -->
  {!! HTML::style('admin/plugins/datatables/dataTables.bootstrap.css') !!}
@endsection
@section('main')
    <table class="table table-bordered" id="users-table">
        <thead>
            <tr>
                <th>Title</th>
                <th>View</th>
            </tr>
        </thead>
    </table>
@stop

@push('scripts')
    <!-- DataTables -->
    <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
<script>
$(function() {
    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('datatablesData') !!}',
        columns: [
            { data: 'title', name: 'title' },
            { data: 'view', name: 'view' }
        ]
    });
});
</script>
@endpush