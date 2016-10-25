@extends('admin.layout.main')
@section('head')
  <!-- DataTables -->
  {!! HTML::style('admin/plugins/datatables/dataTables.bootstrap.css') !!}
@endsection
@section('main')
    <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">List of Menus</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <p>
                    <a href="http://almsaeedstudio.com/download/AdminLTE-dist" class="btn btn-primary"><i class="fa fa-plus"></i> Add New</a>
              </p>
                <table id="menus-table" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Tên Trang</th>
                  <th>Meta keyword</th>
                  <th>Meta Description</th>
                  <th>Actions</th>
                </tr>
                </thead>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <d
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
@endsection

@push('scripts')
<!-- DataTables -->
{!! HTML::script('admin/plugins/datatables/jquery.dataTables.min.js') !!}
{!! HTML::script('admin/plugins/datatables/dataTables.bootstrap.min.js') !!}
    <script>      
    $(function() {
        $('#menus-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('admin_menuTable') !!}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'title', name: 'title' },
                { data: 'meta_keyword', name: 'meta_keyword' },
                { data: 'meta_description', name: 'meta_description' },
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
    });
    </script>
@endpush



