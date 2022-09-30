@extends("dashboard.layout.index")

@section("content")
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card card-primary card-outline">
                <div class="card-header">

                </div>
                <div class="card-body">
                    <h1 class="align-content-center align-items-center">{{  auth()->user()->roles->first()->name }}</h1>
                </div>
            </div><!-- /.card -->
        </div>
        <!-- /.col-md-12 -->
    </div>
    <!-- /.row -->
@endsection
