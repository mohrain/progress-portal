@extends('layouts.app', ['title' => __('समिति')])

@section('content')
    <div class="container-fluid">

        <x-committee-wizard-menu :committee="$committee" />

        <section class="box mt-4">
            <div class="box__header">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="box__title">समिति सचिव <i>({{ $committee->name }})</i></div>
                    @empty($committeeSecretary)
                    @else
                        <form action="{{ route('committee.secretary.destroy', [$committee, $committeeSecretary]) }}"
                            method="post">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger btn-sm" type="submit"
                                onclick="return confirm('के तपाई सुनिचित गर्नुहुन्छ  ?')">
                                Delete
                            </button>
                        </form>
                    @endempty
                </div>
            </div>
            <div class="box__body">
                @empty($committeeSecretary)
                    <form action="{{ route('committee.secretary.store', $committee) }}" method="POST" id="myForm"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <x-employee-select-component />
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input type="checkbox" class="cursor-pointer" name="can_login" id="can_login">
                                    <label for="can_login" class="cursor-pointer"></label>
                                    <span id="label">लगइन गर्न अनुमति दिनुहोस्</span>
                                </div>
                            </div>
                            <div class=" col-12" id="loin_details"></div>
                            <div class="col-12 d-flex justify-content-end">
                                <div class="mt-4 text-right">
                                    <button type="submit" class="btn btn-primary">{{ 'सुरक्षित' }}</button>
                                </div>
                            </div>
                        </div>
                    </form>
                @else
                    <div class="col-md-3">


                        <div class="card" style="height: 320px;">
                            <img id="newProfilePhotoPreview"
                                src="{{ $committeeSecretary->employee->profile ? asset('storage/' . $committeeSecretary->employee->profile) : asset('assets/img/no-image.png') }}"
                                class="feature-image card-img-top">
                            <div class="card-body text-center">
                                <b class="card-title text-theme-color">
                                    {{ $committeeSecretary->employee->name }}
                                </b>
                                <div class="cart-text">
                                    {{ $committeeSecretary->employee->designation }}
                                </div>
                                <a href="{{ route('employees.show', $committeeSecretary->employee) }}"
                                    class="btn btn-sm btn-primary">पुरा
                                    हेर्नुहोस्</a>
                            </div>
                        </div>
                    </div>
                @endempty
            </div>
        </section>
    </div>
@endsection

@push('styles')
    <style>
        .cursor-pointer {
            cursor: pointer;
        }
    </style>
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            const checkbox = document.getElementById("can_login");
            const label = document.getElementById("label");
            let employeeName = '';
            let designation = '';
            let email = '';
            let employee_id = '';

            checkbox.addEventListener("change", () => {
                if (employeeName) {
                    const myDiv = document.getElementById("loin_details");
                    myDiv.innerHTML = '';
                    generateDiv();
                } else {
                    // alert('कृपया कर्मचारी चयन गर्नुहोस्');
                }
            });

            $("#employee_id").change(function() {
                const id = $(this).val();
                employee_id = id;
                const baseUrl = "{{ route('employees.getData', ':id') }}";
                const url = baseUrl.replace(':id', id);

                $.ajax({
                    type: "GET",
                    url,
                    success: (response) => {
                        employeeName = response.name;
                        designation = response.designation;
                        email = response.email;

                        if(response.user.id){
                            checkbox.style.display = 'none';
                            label.innerHTML="लोगिन पहिले नै छ";
                            label.style.color = 'red';
                        }
                        generateDiv();
                        // console.log(response)
                    }
                });
            });

            function generateDiv() {
                const myDiv = document.getElementById("loin_details");
                if (checkbox.checked) {
                    const html = `
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label>प्रयोगकर्ता नाम *:</label>
                <input type="text" class="form-control" placeholder="Username" name="username" required value="">
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label>इमेल *:</label>
                <input type="text" class="form-control" name="email" required value="${email}">
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label>पासवर्ड *:</label>
                <input type="password" class="form-control" name="password" required placeholder="Password">
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label>पुन: पासवर्ड *:</label>
                <input type="password" class="form-control" name="password_confirmation" required placeholder="Password">
              </div>
            </div>
          </div>
        `;
                    myDiv.innerHTML = html;
                } else {
                    myDiv.innerHTML = '';
                }
            }

            $("#myForm").submit(function(event) {
                event.preventDefault();
                var $form = $(this),
                    username = $form.find("input[name='username']").val(),
                    email = $form.find("input[name='email']").val(),
                    password = $form.find("input[name='password']").val(),
                    password_confirmation = $form.find("input[name='password_confirmation']").val(),
                    url = $form.attr("action"),
                    token = $form.find("input[name='_token']").val();

                var posting = $.post(url, {
                    username: username,
                    email: email,
                    password: password,
                    employee_id: employee_id,
                    can_login: $form.find("input[name='can_login']").val(),
                    password_confirmation: password_confirmation,
                    _token: token
                });
                // posting.done(function(data) {
                //     var content = $(data).find("#content");
                //     $("#result").empty().append(content);
                // });

                posting.done(function(data) {

                    location.reload();

                }).fail(function(xhr, status, error) {

                    var errors = xhr.responseJSON;

                    if (errors) {
                        var myerrors = errors.errors;
                        var usernameMessage = myerrors["username"];
                        var emailMessage = myerrors["email"];
                        var passwordMessage = myerrors["password"];
                        var employeeMessage = myerrors["employee_id"];

                        if (usernameMessage) {
                            errorMessageAlert(usernameMessage[0])
                        }

                        if (emailMessage) {
                            errorMessageAlert(emailMessage[0])
                        }
                        if (passwordMessage) {
                            errorMessageAlert(passwordMessage[0])
                        }

                        if (employeeMessage) {
                            errorMessageAlert(employeeMessage[0])
                        }
                    }

                });
            });


            function errorMessageAlert(msg) {
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    }
                });
                Toast.fire({
                    icon: "error",
                    title: msg
                });
            }
        });
    </script>
@endpush
