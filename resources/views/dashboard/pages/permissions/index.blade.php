@extends("dashboard.layout.index")

@section("content")
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h5 class="card-title {{ is_rtl() ? "float-left" : "" }}">{{__("app.Permission")}}</h5>
                    @canany('create-permission')
                        <div class="btn btn-success btn-add  float-right" data-toggle="modal"
                             data-target="#permissionModal">{{__("app.Add Permission")}}</div>
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
                            <th>{{__("app.Role")}}</th>
                            <th>{{__("app.Actions")}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($permissions as $permission)
                            <tr>
                                <th>{{$i++}}</th>
                                <th>{{ $permission->name }}</th>
                                <th>{{ $permission->name_ar }}</th>
                                <th>{{ $permission->slug }}</th>
                                <th>{{ $permission->roles?->implode("name",',') }}</th>
                                <th>
                                    @canAny('update-permission')
                                        <div class='btn btn-primary mr-1 btn-edit-role'
                                             title='{{__("app.Edit",['record' => $permission->name])}}'
                                             data-data='{{$permission}}'><i class='fa fa-edit'></i> {{__("app.Edit")}}</div>
                                    @endcanany
                                    @canAny('delete-permission')
                                        <button class="btn btn-danger btn-delete " type="button"
                                                data-url="{{ route("dashboard.permissions.destroy", $permission->id) }}"
                                                data-name="{{ $permission->name }}"
                                                data-title="{{__("app.Are you Sure")}}"
                                                data-text="{{__('app.Delete ' ,['record' => $permission->name])}}"
                                                data-back="{{ route("dashboard.permissions.index") }}">
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
                        {{ $permissions->withQueryString()->links('pagination::bootstrap-5') }}
                        </tfoot>
                    </table>
                </div>
            </div><!-- /.card -->
        </div>
        <!-- /.col-md-12 -->
    </div>
    <!-- /.row -->
    @include("dashboard.pages.permissions.model")
@endsection
