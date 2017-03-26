@extends('teacher.template')

@section('content')
<div class="container">
    <div class="row">

        <!-- Sidebar -->
        <div class="col-md-3">
            @include('teacher.partials.sidebar')
        </div>

        <!-- Main Content -->
         <div class="col-md-9">

             @include('teacher.partials.alert')
            <div class="panel panel-default">

                <div class="panel-heading">Teacher</div>
                <div class="panel-body">
                    You are logged in!
                </div>

            </div>

        </div>

    </div>
</div>
@endsection
