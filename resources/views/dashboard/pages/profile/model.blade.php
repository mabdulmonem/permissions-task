@php use App\Models\Role; @endphp
<div class="modal fade" id="usersModal" style="display: none;" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{__("app.User")}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="#" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="me" value="1">
                <div class="modal-body">
                    <div class="col-12">
                        <img src="{{ asset( auth()->user()->photo) }}" class="preview-img img " alt="" id="logo"
                             style="width: 50%"/>
                        <div class="btn btn-default btn-file">{{__("app.Image")}}
                            <i class="fas fa-paperclip"></i>
                            <input type="file" value="{{ old('photo') }}" class="upload" name="photo">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group ">
                            <label for="name">{{__("app.Name")}}</label>
                            <input type="text" class="form-control " id="name" placeholder="{{__("app.Name")}}" name="name"
                                   value="{{ old("name") ??  auth()->user()->name }}" required autocomplete="on">
                            <div class="alert alert-danger d-none" style="display: none"></div>
                        </div>
                    </div>
                    <!-- ./col-12 -->
                    <div class="col-12">
                        <div class="form-group ">
                            <label for="email">{{__("app.Email")}}</label>
                            <input type="email" class="form-control " id="email" placeholder="{{__("app.Email")}}"
                                   name="email"
                                   value="{{ old("email") ??  auth()->user()->email }}" required autocomplete="on">
                            <div class="alert alert-danger d-none" style="display: none"></div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group ">
                            <label for="phone">{{__('app.Phone')}}</label>
                            <input type="text" class="form-control " id="phone" placeholder="{{__('app.Phone')}}"
                                   name="phone"
                                   value="{{ old("phone") ??  auth()->user()->phone }}" autocomplete="phone">
                            <div class="alert alert-danger d-none" style="display: none"></div>
                        </div>
                    </div>
                    <!-- ./col-12 -->
                    <!-- ./col-12 -->
                    <div class="col-12">
                        <div class="form-group ">
                            <label for="password">{{__('app.Password')}}</label>
                            <input type="password" class="form-control " id="password" placeholder="{{__('app.Password')}}"
                                   name="password"
                                   value="{{ old("password") }}" autocomplete="on">
                            <div class="alert alert-danger d-none" style="display: none"></div>
                        </div>
                    </div>
                    <!-- ./col-12 -->

                    <div class="col-12">
                        <div class="form-group ">
                            <label for="passwordConfirmation">{{__("app.Confirm Password")}}</label>
                            <input type="password" class="form-control " id="passwordConfirmation"
                                   placeholder="{{__("app.Confirm Password")}}" name="password_confirmation"
                                   value="{{ old("password") }}" autocomplete="on">
                            <div class="alert alert-danger d-none" style="display: none"></div>
                        </div>
                    </div>
                    <!-- ./col-12 -->
                    <div class="col-12">
                        <div class="form-group ">
                            <label for="roles">{{__("app.User role")}}</label>
                            <select name="role" id="roles" class="form-control">
                                @foreach(Role::all() as $role)
                                    @if($role->slug ==  auth()->user()->roles->first()->slug)
                                        <option value="{{$role->slug}}" selected="selected">{{is_rtl()? $role->name_ar:$role->name}}</option>
                                    @else
                                        <option value="{{$role->slug}}">{{is_rtl() ? $role->name_ar:$role->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                            <div class="alert alert-danger d-none" style="display: none"></div>
                        </div>
                    </div>

                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">{{__("app.Close")}}</button>
                        <button type="submit" class="btn btn-primary">{{__("app.Save")}}</button>
                    </div>
                </div>
            </form>
        </div>

    </div>

</div>

@push("js")
    <script>
        let body = $("body"),
            $btnSubmit = $("button[type=submit]"),
            $form = $("form"),
            $model = $("#usersModal")


        $form.submit(function (e) {
            e.preventDefault();
            let data = new FormData(this);
            ajax(data);
        })

        function ajax(data) {
            $.ajax({
                data: data,
                url: "{{ route('profile.update') }}",
                type: "POST",
                processData: false,
                contentType: false,
                cache: false,
                enctype: 'multipart/form-data',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                success: function (data) {
                    if (data.status === 1) {
                        Swal.fire(
                            '{{__('app.Congratulation')}}',
                            data.msg,
                            'success'
                        )

                        $model.modal("hide");
                        $form[0].reset();
                        $form.trigger("reset");
                        $(".alert").addClass("d-none");
                        location.reload();
                    }
                },
                error: function (data, textStatus, jqXHR) {
                    const response = data.responseJSON;
                    if (response) {
                        for (const [key, value] of Object.entries(response.errors)) {
                            $(`#${key}`)
                                .addClass("is-invalid")
                                .parent()
                                .find(".alert")
                                .removeClass("d-none")
                                .text(value[0])
                                .show()
                        }
                    }
                },
            });
        }
    </script>
@endpush
