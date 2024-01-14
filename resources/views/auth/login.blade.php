@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ $url }}">
                            @csrf
                            <div class="form-group">
                                <label for="matric_number">Matric Number</label>
                                <input id="matric_number" type="text" class="form-control" name="matric_number" value="{{ old('matric_number') }}" required autofocus>
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input id="password" type="password" class="form-control" name="password" required autocomplete="current-password">
                            </div>

                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        Remember me
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Bootstrap Modal for Login Errors -->
<div class="modal fade" id="loginErrorModal" tabindex="-1" role="dialog" aria-labelledby="loginErrorModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginErrorModalLabel">Login Failed</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Invalid Matric Number or Password. Please try again.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="closeLoginErrorModal()">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript to manually close the modal and clear form fields -->
<script>
    function closeLoginErrorModal() {
        $('#loginErrorModal').modal('hide');
        clearLoginFormFields();
    }

    function clearLoginFormFields() {
        $('#matric_number').val('');
        $('#password').val('');
    }

    @if ($errors->has('matric_number') || $errors->has('password'))
        $(document).ready(function(){
            $('#loginErrorModal').modal('show');
        });
    @endif
</script>
@endsection
