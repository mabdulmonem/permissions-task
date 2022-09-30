<div class="modal fade" id="rolesModal" style="display: none;" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{__("app.Role")}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="#" method="post">
                @csrf

                <div class="modal-body">
                    <div class="col-12">
                        <div class="form-group ">
                            <label for="name">{{__("app.Name")}}</label>
                            <input type="text" class="form-control " id="name" placeholder="{{__("app.Name")}}" name="name"
                                   value="{{ old("name") }}" required autocomplete="on">
                            <div class="alert alert-danger d-none" style="display: none"></div>
                        </div>
                    </div>
                    <!-- ./col-12 -->
                    <div class="col-12">
                        <div class="form-group ">
                            <label for="name_ar"> {{__("app.Name_ar")}}</label>
                            <input type="text" class="form-control " id="name_ar" placeholder="{{__("app.Name_ar")}}" name="name_ar"
                                   value="{{ old("name_ar") }}" required autocomplete="on">
                            <div class="alert alert-danger d-none" style="display: none"></div>
                        </div>
                    </div>
                    <!-- ./col-12 -->
                    <div class="col-12">
                        <div class="form-group ">
                            <label for="slug">{{__("app.Slug")}}</label>
                            <input type="text" class="form-control " id="slug" placeholder="{{__("app.Slug")}}" name="slug"
                                   value="{{ old("slug") }}" required autocomplete="on">
                            <div class="alert alert-danger d-none" style="display: none"></div>
                        </div>
                    </div>
                    <!-- ./col-12 -->

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
        let id, body = $("body"),
            $btnSubmit = $("button[type=submit]"),
            $form = $("form"),
            $method = `<input type="hidden" name="_method" value="PUT">`,
            $model = $("#rolesModal")


        $form.submit(function (e) {
            e.preventDefault();
            let formData = new FormData(this);
            ajax(formData);
        })

        body.on("click", ".btn-edit-role", function () {
            let data = JSON.parse(JSON.stringify($(this).data("data")));

            $btnSubmit.attr("data-method", "put")
                .attr("data-id", data.id);

            $form.append(`<input type=hidden value=${data.id} name="id" >`)

            for (const [key, value] of Object.entries(data)) {
                if (key !== "deleted_at") {
                    $(`#${key}`).val(value)
                }
            }

            $model.modal("show");
        });

       body.on("click",".btn-delete",function () {
            let _this = $(this),
                oldBtnHtml = _this.html();

            _this.attr("disabled","disabled");

            Swal.fire({
                title: "{{__('app.Are you sure?')}}",
                text: "{{__("app.You won't be able to revert this!")}}",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '{{__("app.Yes, delete it!")}}'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: _this.data("url"),
                        data:{_token:"{{csrf_token()}}"},
                        type: "DELETE",
                        dataType: "json",
                        success: function (result) {
                            if (result.status === 1) {
                                Swal.fire({
                                    title : "{{__('app.Deleted!')}}",
                                    text : "{{__('app.Your record has been deleted.')}}",
                                    icon :'success',
                                    timer: 2000
                                })
                               location.reload();
                            }
                        }
                    });
                } else if (result.dismiss === Swal.DismissReason.cancel){
                    _this.removeAttr("disabled").html(oldBtnHtml);
                }
            })
        });

        $(".btn-add").click(function () {
            $form[0].reset();
            $form.trigger("reset");

            $('input[name=id]').remove();
        })

        function ajax(data) {
            $.ajax({
                data: data,//$form.serialize(),
                url: "{{ route('dashboard.roles.store') }}",
                type: "POST",
                processData: false,
                contentType: false,
                cache: false,
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
                        if ($btnSubmit.data("method") === "put") {
                            $btnSubmit.removeAttr("data-method");
                            $("input[name=_method]").remove();
                        }
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
