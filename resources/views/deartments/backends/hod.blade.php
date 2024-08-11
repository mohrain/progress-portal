@extends('deartments.backends.edit')

@section('departmentContent')
    <div class="card mt-2">
        <div class="box__header">
            <div class="d-flex justify-content-between align-items-center">
                <div class="box__title">शाखा प्रमुख <i>({{ $department->name }})</i></div>

                @empty($hod)
                @else
                    <form action="{{ route('department.hodDestroy', [$department->slug, $hod->id]) }}" method="post">
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
        <div class="card-body">
            @empty($hod)
                <form action="{{ route('department.hodStore', $department->id) }}" method="POST" class="form" id="myForm">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label>शाखा प्रमुख </label>
                        <select class="form-control text-capitalize required @error('employee_id') is-invalid @enderror"
                            name="employee_id" id="employee_id">
                            <option value="">छान्नुहोस्</option>
                            @foreach ($officeBeareds as $officeBeared)
                                {{-- @if ($officeBeared->department || $officeBeared->committeeSecretary)
                                    @php
                                        continue;
                                    @endphp
                                @endif --}}
                                <option value="{{ $officeBeared->id }}"
                                    {{ $department->employee_id == $officeBeared->id ? 'selected' : '' }}>
                                    <div>
                                        {{ $officeBeared->name }}
                                    </div>

                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" class="cursor-pointer" name="can_login" id="can_login">
                        <label for="can_login" class="cursor-pointer">लगइन गर्न अनुमति दिनुहोस्</label>
                    </div>
                    <div class="form-group" id="loin_details"></div>
                    <div class="form-group float-right">
                        <button type="submit" class="btn btn-primary z-depth-0">सुरक्षित</button>
                    </div>
                </form>
            @else
                <div class="col-md-3">
                    <div class="card" style="height: 320px;">
                        <img id="newProfilePhotoPreview"
                            src="{{ $hod->profile ? asset('storage/' . $hod->profile) : asset('assets/img/no-image.png') }}"
                            class="feature-image card-img-top">
                        <div class="card-body text-center">
                            <b class="card-title text-theme-color">
                                {{ $hod->name }}
                            </b>
                            <div class="cart-text">
                                {{ $hod->designation }}
                            </div>
                            <a href="{{ route('employees.show', $hod) }}" class="btn btn-sm btn-primary">पुरा
                                हेर्नुहोस्</a>
                        </div>
                    </div>
                </div>
            @endempty
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(function() {
            $('#employee_id').each(function() {
                $(this).select2({
                    theme: 'bootstrap4',
                    width: $(this).data('width') ? $(this).data('width') : $(this).hasClass(
                        'w-100') ? '100%' : 'style',
                    placeholder: $(this).data('placeholder'),
                    allowClear: Boolean($(this).data('allow-clear')),
                    closeOnSelect: !$(this).attr('multiple'),
                });
            });
        });
    </script>
@endpush
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            const checkbox = document.getElementById("can_login");
            console.log(checkbox)
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
