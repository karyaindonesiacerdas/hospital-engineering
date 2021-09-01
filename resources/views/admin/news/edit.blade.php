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
                        <div class="float-left">
                            <h3 class="card-title">News</h3>
                        </div>
                        <div class="float-right">
                            <a href="{{ route('news.index') }}" class="btn btn-small btn-danger">Back</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" value="{{ $news->title }}" name="title" class="form-control"
                                    id="title" placeholder="Title">
                            </div>
                            <div class="form-group">
                                <label for="publish_at">Publish Date</label>
                                <input type="date" value="{{ $news->publish_at }}" name="publish_at"
                                    class="form-control" id="publish_at" placeholder="Title">
                            </div>
                            <div class="form-group">
                                <label for="body">Content</label>
                                <textarea class="ckeditor form-control" name="body">{!! $news->body !!}</textarea>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox"
                                    {{  ($news->publish == 1 ? ' checked' : '') }} name="publish" id="publish">
                                <label class="form-check-label" for="publish">
                                    Publish
                                </label>
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
@section('script')
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
            $('.ckeditor').ckeditor();
        });
</script>
@endsection
