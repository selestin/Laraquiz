@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.laravel-quiz')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['tests.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.quiz')
        </div>
        <?php //dd($questions) ?>
    @if(count($questions) > 0)
        <div class="panel-body">
        <?php $i = 1; ?>
        @foreach($questions as $question)
            @if ($i > 1) <hr /> @endif
            <div class="row">
                <div class="col-xs-12 form-group">
                    <div class="form-group">
                        <strong>Question {{ $i }}.<br />{!! nl2br($question->question_text) !!}</strong>

                        @if ($question->code_snippet != '')
                            <div class="code_snippet">{!! $question->code_snippet !!}</div>
                        @endif

                        <input
                            type="hidden"
                            name="questions[{{ $i }}]"
                            value="{{ $question->id }}">
                    @foreach($question->options as $option)
                        <br>
                        <label class="radio-inline">
                            <input
                                type="radio"
                                name="answers[{{ $question->id }}]"
                                value="{{ $option->id }}">
                            {{ $option->option }}
                        </label>
                    @endforeach
                    </div>
                </div>
            </div>
        <?php $i++; ?>
        @endforeach
        </div>
    @endif
    </div>
    <div >    
         <div><p><a href="#" class="btn btn-primary" role="button">Previos</a> <a href="#" class="btn btn-default" role="button">Next</a></p></div>



         <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
            <div class="btn-group" role="group" aria-label="First group"> 
                <button type="button" class="btn btn-default">1</button> 
                <button type="button" class="btn btn-default">2</button>
                <button type="button" class="btn btn-default">3</button> 
                <button type="button" class="btn btn-default">4</button> 
                <button type="button" class="btn btn-default">5</button>
                <button type="button" class="btn btn-default">6</button>
                <button type="button" class="btn btn-default">7</button>
                <button type="button" class="btn btn-default">8</button>
                <button type="button" class="btn btn-default">9</button>
                <button type="button" class="btn btn-default">10</button>
           </div>
         </div> 


        {!! Form::submit(trans('quickadmin.submit_quiz'), ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    </div>
@stop

@section('javascript')
    @parent
    <script src="{{ url('quickadmin/js') }}/timepicker.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.4.5/jquery-ui-timepicker-addon.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.2.0/js/dataTables.select.min.js"></script>
    <script>
        $('.datetime').datetimepicker({
            autoclose: true,
            dateFormat: "{{ config('app.date_format_js') }}",
            timeFormat: "hh:mm:ss"
        });
    </script>

@stop
