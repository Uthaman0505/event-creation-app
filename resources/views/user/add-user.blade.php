<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico">
    <link
        href="https://fonts.googleapis.com/css?family=Lato:300,400,400italic,700,700italic,900,900italic&amp;subset=latin,latin-ext"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Open%20Sans:300,400,400italic,600,600italic,700,700italic&amp;subset=latin,latin-ext"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/flexslider.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/chosen.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/color-01.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    @livewireStyles
</head>

<body>
    <div>
        <div class="container" style="padding: 30px 0;">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-md-6">
                                    <strong>Add New User</strong>
                                </div>
                                <div class="col-md-6">
                                    @if (Auth::user()->user_role === 'MANAGEMENT')
                                        <a href="{{ route('management.dashboard.users') }}"
                                            class="btn btn-success pull-right">All
                                            User List</a>
                                    @else
                                        <a href="{{ route('admin.dashboard.users') }}"
                                            class="btn btn-success pull-right">All
                                            User List</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <form
                                action="{{ Auth::user()->user_role == 'ADMIN' ? route('admin.user.store') : route('management.user.store') }}"
                                class="form-horizontal" method="POST">
                                @csrf
                                {{-- @if (Session::has('message'))
                                    <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                                @endif --}}
                                <div class="form-group">
                                    <label for="" class="col-md-4 control-label">Name</label>
                                    <div class="col-md-4">
                                        <input type="text" placeholder="Name" name="name" class="form-control input-md"
                                            required />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="" class="col-md-4 control-label">Email</label>
                                    <div class="col-md-4">
                                        <input type="email" placeholder="Email" name="email"
                                            class="form-control input-md" required />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="" class="col-md-4 control-label">Role</label>
                                    <div class="col-md-4">
                                        <select name="role" id="" class="form-control input-md" required>
                                            <option value="ADMIN">Admin</option>
                                            <option value="MANAGEMENT">Management</option>
                                            <option value="USER">User</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="" class="col-md-4 control-label"></label>
                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-primary">Register New user</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>






    <script src="{{ asset('assets/js/jquery-1.12.4.minb8ff.js?ver=1.12.4') }}"></script>
    <script src="{{ asset('assets/js/jquery-ui-1.12.4.minb8ff.js?ver=1.12.4') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.flexslider.js') }}"></script>
    {{-- <script src="{{ asset('assets/js/chosen.jquery.min.js') }}"></script> --}}
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.sticky.js') }}"></script>
    <script src="{{ asset('assets/js/functions.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    @livewireScripts

    @stack('scripts')
</body>

</html>
