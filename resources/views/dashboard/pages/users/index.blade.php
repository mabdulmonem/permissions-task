@extends("dashboard.layout.index")

@section("content")
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h5 class="card-title {{ is_rtl() ? "float-left" : "" }}">{{__("app.Users")}}</h5>
                    @canany("create-users")
                        <div class="btn btn-success btn-add float-right" data-toggle="modal"
                             data-target="#usersModal">{{__("app.Add User")}}</div>
                    @endcanany
                </div>
                <div class="card-body">
                    <table id="usersTable" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{__("app.Photo")}}</th>
                            <th>{{__("app.Name")}}</th>
                            <th>{{__("app.Email")}}</th>
                            <th>{{__("app.Role")}} </th>
                            <th>{{__("app.Actions")}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($users as $user)
                            <tr>
                                <th>{{$i++}}</th>
                                <th><img style="width: 50px;" src="{{ asset($user->photo) }}" alt="{{ $user->name }}"
                                         class="table-avatar"></th>
                                <th>{{ $user->name }}</th>
                                <th>{{ $user->email }}</th>
                                <th>{{ $user->roles->implode(is_rtl() ? "name_ar" :"name",',') }}</th>
                                <th>
                                    @canany('update-users')
                                        <div
                                            class='btn btn-primary mr-1  {{ $user->id !=1 ? "btn-edit-user" : (auth()->check() && auth()->id() == 1 ? "btn-edit-user" :"" ) }}'
                                            title='{{ __("app.Edit",['record' => $user->name]) }}'
                                            data-data='{{auth()->check() && auth()->id() == 1 ? $user : null}}'><i
                                                class='fa fa-edit'></i> {{__("app.Edit")}}</div>
                                    @endcanany
                                    @canany('delete-users')
                                        @if($user->id !=1)
                                            <button class="btn btn-danger btn-delete " type="button"
                                                    data-url="{{ route("dashboard.users.destroy", $user->id) }}"
                                                    data-name="{{ $user->name }}"
                                                    data-title="{{__("app.Are you Sure")}}"
                                                    data-text="{{__('app.Delete ' ,['record' => $user->name])}}"
                                                    data-back="{{ route("dashboard.users.index") }}">
                                                <i class="fa fa-trash"></i> {{__("app.Delete")}}</button>
                                        @else
                                            <button class="btn btn-danger disabled" disabled="disabled"><i
                                                    class="fa fa-trash"></i> {{__("app.Delete")}}</button>
                                        @endif
                                    @endcanany
                                </th>
                            </tr>
                        @empty
                            <tr>
                                <th>{{__("app.No users founded")}}</th>
                            </tr>
                        @endforelse
                        </tbody>

                        <tfoot>
                        {{ $users->withQueryString()->links('pagination::bootstrap-5')  }}
                        </tfoot>
                    </table>
                </div>
            </div><!-- /.card -->
        </div>
        <!-- /.col-md-12 -->
    </div>
    <!-- /.row -->
    @include("dashboard.pages.users.model")
@endsection
