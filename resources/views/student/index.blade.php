@extends('student.template')

@section('style')

@endsection

@section('content')
    <main class="container">
        <div class="row">

            <!-- Sidebar-->
            <aside class="col-md-3">
                @include('student.partials.sidebar')
            </aside>
            <!-- Content -->
            <section class="col-md-9">

            </section>

        </div><!--/.row-->
    </main><!--/.container-->
@endsection
