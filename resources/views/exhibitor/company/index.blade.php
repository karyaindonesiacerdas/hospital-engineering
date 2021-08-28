@extends('layouts.app-dashboard')
@section('content')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- Widget: user widget style 1 -->
                <div class="card card-widget widget-user shadow">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-info">
                        <h3 class="widget-user-username">Alexander Pierce</h3>
                        <h5 class="widget-user-desc">Founder & CEO</h5>
                    </div>
                    <div class="widget-user-image">
                        <img class="img-circle elevation-2" src="{{ asset('dist/img/AdminLTELogo.png') }}"
                            alt="User Avatar">
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-sm-4 border-right">
                                <div class="description-block">
                                    <h5 class="description-header">3,200</h5>
                                    <span class="description-text">SALES</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 border-right">
                                <div class="description-block">
                                    <h5 class="description-header">13,000</h5>
                                    <span class="description-text">FOLLOWERS</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4">
                                <div class="description-block">
                                    <h5 class="description-header">35</h5>
                                    <span class="description-text">PRODUCTS</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                </div>
                <!-- /.widget-user -->
            </div>
            <!-- left column -->
            <div class="col-md-6">
                <!-- jquery validation -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Update Company</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('user.update', \Auth::id()) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="company_name">Company Name</label>
                                <input type="text" name="company_name" value="{{ $user->company_name }}"
                                    class="form-control" id="company_name" placeholder="Company Name">
                            </div>
                            <div class="form-group">
                                <label for="company_logo">Company Logo</label>
                                <input type="file" name="company_logo" value="{{ $user->company_logo }}"
                                    class="form-control" id="company_logo" placeholder="Company Logo">
                            </div>
                            <div class="form-group">
                                <label for="company_video_url">Company Video</label>
                                <input type="text" name="company_video_url" value="{{ $user->company_video_url }}"
                                    class="form-control" id="company_video_url" placeholder="Company Video">
                            </div>
                            <div class="form-group">
                                <label for="company_web">Company Web</label>
                                <input type="text" name="company_web" value="{{ $user->company_web }}"
                                    class="form-control" id="company_web" placeholder="Company Web">
                            </div>
                            <div class="form-group">
                                <label for="company_description">Company Description</label>
                                <input type="text" name="company_description" value="{{ $user->company_description }}"
                                    class="form-control" id="company_description" placeholder="Company Description">
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection
