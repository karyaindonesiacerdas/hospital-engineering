@extends('layouts.app-dashboard')
@section('content')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- jquery validation -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Product</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Product Name</label>
                                <input type="text" name="name" class="form-control" id="name"
                                    placeholder="Product Name">
                            </div>
                            <div class="form-group">
                                <label for="image">Product Image</label>
                                <input type="file" name="image" class="form-control" id="image"
                                    placeholder="Product Image">
                            </div>
                            <div class="form-group">
                                <label for="video_url">Product Video</label>
                                <input type="text" name="video_url" class="form-control" id="video_url"
                                    placeholder="Product Video">
                            </div>
                            <div class="form-group">
                                <label for="price">Product Price</label>
                                <input type="text" name="price" class="form-control" id="price"
                                    placeholder="Product Price">
                            </div>
                            <div class="form-group">
                                <label for="description">Product Description</label>
                                <input type="text" name="description" class="form-control" id="description"
                                    placeholder="Product Description">
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
            <!--/.col (left) -->
            <!-- right column -->
            <div class="col-md-6">

            </div>
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection
