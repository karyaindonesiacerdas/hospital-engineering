@extends('layouts.app-dashboard')
@section('content')
<!-- Main content -->
<section class="content">
    <div class="ontainer-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- jquery validation -->
                <div class="card card-primary">
                    <div class="card-header">
                        <div class="float-left">
                            <h3 class="card-title">News</h3>
                        </div>
                        <div class="float-right">
                            <a href="{{ route('news.create') }}" class="btn btn-small btn-success">Add</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Slug</th>
                                    <th>Content</th>
                                    <th>Publish At</th>
                                    <th>Publish</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($news as $new)
                                <tr>
                                    <td>{{ $new->id }}</td>
                                    <td>{{ $new->title }}</td>
                                    <td>{{ $new->slug }}</td>
                                    <td>{!! $new->body !!}</td>
                                    <td>{{ $new->publish_at }}</td>
                                    <td>{{ $new->publish ? 'publish' : 'pending' }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.card -->
            </div>
            <!--/.col (left) -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection
@section('script')
<script>
    $(function () {
        $("#example1").DataTable({
          "responsive": true,
        });
      });
</script>
@endsection
