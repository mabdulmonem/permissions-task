@extends("dashboard.layout.index")

@section("content")
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h5 class="card-title">{{__("app.Users")}}</h5>
                    @canany("create-users")
                        <div class="btn btn-success btn-add float-right" data-toggle="modal"
                             data-target="#usersModal">{{__("app.Edit")}}</div>
                    @endcanany
                </div>
                <div class="card-body">


                    @if($photo = auth()->user()->photo)

                        <img src="{{ asset($photo) }}" alt="{{auth()->user()->name}}">
                    @endif

                    @php($userRole= auth()->user()->roles->first())
                    <h1>{{__('app.Name')}} : {{auth()->user()->name}}</h1>
                    <h1>{{__('app.Email')}} : {{auth()->user()->email}}</h1>
                    <h1>{{__('app.Phone')}} : {{auth()->user()->phone}}</h1>
                    <h1>{{__('app.Roles')}}
                        : {{is_rtl()?  $userRole->name_ar:$userRole->name}}</h1>
                    <h1>{{__('app.Permissions')}} :</h1>

                    <ul>
                        @foreach(auth()->user()->permissions as $perm)
                            <li>{{ is_rtl()? $perm->name_ar : $perm->name }}</li>
                        @endforeach
                    </ul>

                </div>
            </div><!-- /.card -->
        </div>
        <!-- /.col-md-12 -->
    </div>
    <!-- /.row -->
    @include("dashboard.pages.profile.model")
@endsection

