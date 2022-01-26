<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Event</title>
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
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
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
                                    <strong>Edit Event</strong>
                                </div>
                                <div class="col-md-6">
                                    @if (Auth::user()->user_role === 'MANAGEMENT')
                                        <a href="{{ route('management.dashboard.events') }}"
                                            class="btn btn-success pull-right">Events List</a>
                                    @else
                                        <a href="{{ route('admin.dashboard.events') }}"
                                            class="btn btn-success pull-right">Events List</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <form
                                action="{{ Auth::user()->user_role == 'ADMIN' ? route('event.update') : route('management.event.update') }}"
                                class="form-horizontal" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="user_id" value="{{ $event->user_id }}">
                                <input type="hidden" name="id" value="{{ $event->id }}">
                                <div class="form-group">
                                    <label for="" class="col-md-4 control-label">Title</label>
                                    <div class="col-md-4">
                                        <input type="text" placeholder="Title" name="title"
                                            class="form-control input-md" required value="{{ $event->title }}" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="" class="col-md-4 control-label">Description</label>
                                    <div class="col-md-4">
                                        <textarea name="description" id=""
                                            class="form-control">{{ $event->description }}</textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="" class="col-md-4 control-label">Start Date</label>
                                    <div class="col-md-4">
                                        <input type="text" placeholder="Start Date" name="start_date"
                                            class="form-control input-md" id="datepicker" autocomplete="off" required
                                            value="{{ $event->start_date }}" />
                                        </span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="" class="col-md-4 control-label">End Date</label>
                                    <div class="col-md-4">
                                        <input type="text" placeholder="End Date" name="end_date"
                                            class="form-control input-md" id="datepicker2" autocomplete="off" required
                                            value="{{ $event->end_date }}" />
                                        </span>
                                    </div>
                                </div>
                                @if (Auth::user()->user_role == 'ADMIN')
                                    <div class="form-group">
                                        <label for="" class="col-md-4 control-label">Status</label>
                                        <div class="col-md-4">
                                            <select name="status" id="" class="form-control input-md" required>
                                                <option selected disabled value="">
                                                    {{ $event->status === 0 ? 'Not-Approve' : 'Approved' }}</option>
                                                <option value="1">Approved</option>
                                                <option value="0">Not-Approve</option>
                                            </select>
                                        </div>
                                    </div>
                                @endif


                                <div class="form-group">
                                    <label for="" class="col-md-4 control-label"></label>
                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-primary">Update Event</button>
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
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <script>
        $(function() {
            $("#datepicker").datepicker({
                dateFormat: "yy-mm-dd"
            });
        });

        $(function() {
            $("#datepicker2").datepicker({
                dateFormat: "yy-mm-dd"
            });
        });
    </script>

    @livewireScripts

    @stack('scripts')
</body>

</html>
