@extends("dashboard.layout.index")

@section("content")
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h5 class="card-title {{ is_rtl() ? "float-left" : "" }}"> {{__("app.Roles")}}</h5>
                    @canany('create-roles')
                        <div class="btn btn-success btn-add float-right" data-toggle="modal"
                             data-target="#rolesModal">{{__("app.Add Role")}}</div>
                    @endcanany
                </div>
                <div class="card-body">
                    <table id="rolesTable" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{__("app.Name")}}</th>
                            <th>{{__("app.Name_ar")}}</th>
                            <th>{{__("app.Slug")}}</th>
                            <th>{{__("app.Permissions")}}</th>
                            <th>{{__("app.Actions")}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($roles as $role)
                            <tr>
                                <th>{{$i++}}</th>
                                <th>{{ $role->name }}</th>
                                <th>{{ $role->name_ar }}</th>
                                <th>{{ $role->slug }}</th>
                                <th>{{ $role->permissions?->implode(is_rtl() ?"name_ar" :"name",',') }}</th>
                                <th>
                                    @canany('update-roles')
                                        <div class='btn btn-primary mr-1 btn-edit-role'
                                             title='{{ __("app.Edit",['record' => $role->name]) }}' data-data='{{$role}}'><i
                                                class='fa fa-edit'></i> {{__("app.Edit")}}</div>
                                    @endcanany
                                    @canany('delete-roles')
                                        <button class="btn btn-danger btn-delete " type="button"
                                                data-url="{{ route("dashboard.roles.destroy", $role->id) }}"
                                                data-name="{{ $role->name }}"
                                                data-title="{{__("app.Are you Sure")}}"
                                                data-text="{{__('app.Delete ' ,['record' => $role->name])}}"
                                                data-back="{{ route("dashboard.roles.index") }}">
                                            <i class="fa fa-trash"></i> {{__("app.Delete")}}</button>
                                    @endcanany

                                </th>
                            </tr>
                        @empty
                            <tr>
                                <th>{{__("app.No roles founded")}}</th>
                            </tr>
                        @endforelse
                        </tbody>

                        <tfoot>
                        {{ $roles->withQueryString()->links('pagination::bootstrap-5')  }}
                        </tfoot>
                    </table>
                </div>
            </div><!-- /.card -->
        </div>
        <!-- /.col-md-12 -->
    </div>
    <!-- /.row -->
    @include("dashboard.pages.roles.model")
@endsection
