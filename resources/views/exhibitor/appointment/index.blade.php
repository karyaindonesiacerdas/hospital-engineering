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
                            <h3 class="card-title">Appointment</h3>
                        </div>
                        <div class="float-right">
                            <a href="{{ route('appointment.create') }}" class="btn btn-small btn-success">Add</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($appointments as $appointment)
                                <tr>
                                    <td>{{ $appointment->id }}</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{ route('appointment.edit', $appointment->id) }}"
                                                class="btn btn-sm btn-warning">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('appointment.destroy', $appointment->id) }}"
                                                method="post"
                                                onsubmit="return confirm('Do you really want to delete the appointments?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
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
