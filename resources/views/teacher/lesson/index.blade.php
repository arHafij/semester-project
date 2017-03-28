@extends('teacher.template')

@section('style')

    .lesson-exam-wrapper{
        border-bottom: 1px solid #dddddd;
    }
@endsection

@section('content')
    <div class="container">
        <div class="row">

            <!-- Sidebar -->
            <div class="col-md-3">
               @include('teacher.partials.sidebar')
            </div>

            <!-- Main Content -->
            <div class="col-md-9">
                <div class="panel panel-default row">

                    <h4 class="panel-heading">My Lesson</h4>

                    {{--Lesson and Exam --}}
                    @if(count($lessons) > 0)
                        @foreach($lessons as $lesson)
                             <div class="panel-body lesson-exam-wrapper">
                        {{--Lessons--}}
                        <div class="lesson-wrapper col-md-6">
                            <div class="lesson">
                               <div class="lesson__title">{{ $lesson->lessons_title }}</div>
                               <div class="lesson-action" data-lesson-id="{{ $lesson->id }}">
                                   <a href="{{ route('lesson.show',['lesson'=>$lesson->id]) }}" class="btn btn-primary btn-sm">View</a> |
                                   <a href="{{ route('lesson.edit',['lesson'=>$lesson->id]) }}" class="btn btn-info btn-sm">Edit</a> |
                                   <a href="#" class="btn btn-danger btn-sm lesson-action__delete"  data-toggle="modal" data-target="#myModal">Delete</a> |
                                   <a href="#" class="btn btn-success btn-sm">New Exam</a>
                               </div>
                           </div>
                        </div>
                        {{--Exams--}}
                        <div class="exam-wrapper col-md-6">
                            <div class="exam">
                                <div class="exam__name">Exam-1</div>
                                <div class="exam-action">
                                    <a href="#">View</a> |
                                    <a href="#">Edit</a> |
                                    <a href="#">Delete</a>
                                </div>
                            </div>
                            <div class="exam">
                                <div class="exam__name">Exam-1</div>
                                <div class="exam-action">
                                    <a href="#">View</a> |
                                    <a href="#">Edit</a> |
                                    <a href="#">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                        @endforeach
                    @else
                        <div class="panel-body lesson-exam-wrapper">
                        {{--Lessons--}}
                        <div class="lesson-wrapper col-md-6">
                            <div class="lesson">
                                <p>Sorry! No lesson</p>
                            </div>
                        </div>
                        {{--Exams--}}
                        <div class="exam-wrapper col-md-6">
                            <div class="exam">
                               <p>No exam</p>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div><!--./row-->
    </div><!--./container-->

<!-- Modal Area -->
<div class="modal fade" tabindex="-1" role="dialog" id="myModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
          <h4>Are you sure?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-lg btn-success modal-footer__yes-btn">Yes</button>
        <button type="button" class="btn btn-lg btn-danger" data-dismiss="modal">No</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

@endsection

@section('script')
    var url = '/lesson/' + $('.lesson-action').data('lesson-id');
    var token = "{{ csrf_token() }}";

    $('#myModal').on('shown.bs.modal');

    $(".lesson-action__delete").click(function(event){
        event.preventDefault();
    });

    $(".modal-footer__yes-btn").click(function(){
        $.ajax({
            url: url,
            type: "post",
            data: {_token: token, _method: "delete"},
            success: function(){
                location.reload();
                $('#myModal').modal('hide');
            }

        });

    });
@endsection