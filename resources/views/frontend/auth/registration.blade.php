<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up - Voler Admin Dashboard</title>
    <link rel="stylesheet" href="{{url('assets/css/bootstrap.css')}}">
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">
    <link rel="stylesheet" href="{{url('assets/css/app.css')}}">
</head>

<body>
    <div id="auth">
        <div class="container">
            <div class="row">
                <div class="col-md-7 col-sm-12 mx-auto">
                    <div class="card pt-4">
                        <div class="card-body">
                            <div class="text-center mb-5">
                                <img src="{{url('assets/images/favicon.svg')}}" height="48" class='mb-4'>
                                <h3>Sign Up</h3>
                                <p>Please fill the form to register.</p>
                            </div>
                            <form action="{{ route('register.post') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">First Name</label>
                                            <input type="text" id="first-name-column" class="form-control" name="name">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="email-id-column">Email</label>
                                            <input type="email" id="email-id-column" class="form-control" name="email">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="password-column">Password</label>
                                            <input type="password" id="password-column" class="form-control" name="password">
                                        </div>
                                    </div>
                                    <!-- User Type Field -->
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="user-type-column">User Type</label>
                                            <select id="user-type-column" class="form-control" name="user_type" onchange="updateRoleId()">
                                                <option value="Normal User">Normal User</option>
                                                <option value="Delivery Boy">Delivery Boy</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Position Field -->
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="position-column">Position</label>
                                            <input type="text" id="position-column" class="form-control" name="position">
                                        </div>
                                    </div>
                                </div>
                            
                                <!-- Hidden Role ID Field -->
                                <input type="hidden" id="role-id" name="role_id" value="2">
                            
                                <a href="auth-login.html">Have an account? Login</a>
                                <div class="clearfix">
                                    <button class="btn btn-primary float-right">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{url('assets/js/feather-icons/feather.min.js')}}"></script>
    <script src="{{url('assets/js/app.js')}}"></script>
    <script src="{{url('assets/js/main.js')}}"></script>

    <!-- Script to update role_id based on user type -->
    <script>
        function updateRoleId() {
            var userType = document.getElementById('user-type-column').value;
            var roleIdField = document.getElementById('role-id');
            
            if (userType === 'Normal User') {
                roleIdField.value = '2';
            } else if (userType === 'Delivery Boy') {
                roleIdField.value = '3';
            }
        }
    </script>
</body>

</html>
