@extends('layouts.app')

@section('content')
    <style>
        #grad1 {
            height: 1500px;
            background-color: #cccccc;
            background-image: url("/questions.png");
            margin-top: 20px;

        }
        html {
            margin: 0;
        }
        body {
            background-color: #FFFFFF;
            font-size: 17px;
            margin: 36pt;
        }
    </style>
    <body >
    <h3 class="page-title">@lang('quickadmin.laravel-quiz')

    <script type="text/javascript">

    </script>
        <div   id="pie_to_be" style="float:right">timeout</div>>
    </h3>

    {!! Form::open(['method' => 'POST', 'route' => ['tests.store'],'id'=>'caspioform']) !!}

    <div class="panel panel-default"  id="grad1">
        <div class="panel-heading">
            @lang('Answer these 10 questions. Note There is a Limitation on Time.')
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
    </body>
    {!! Form::submit(trans('quickadmin.submit_quiz'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
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

        var myseconds = 10;
      var mycolor = 'rgba(255, 100, 0, 0.8)';
      alert('You will have '+Math.floor(myseconds/60)+' minutes and '+myseconds%60+' seconds to finish. Press “OK” to begin.'); $(function(){ $('div#pie_to_be').pietimer({ seconds: myseconds, color: mycolor }, function(){ $('#caspioform').submit(); });}); (function($){jQuery.fn.pietimer=function(options,callback){var settings={'seconds':10,'color':'rgba(255, 255, 255, 0.8)','height':this.height(),'width':this.width()};if(options){$.extend(settings,options);}this.html('<canvas id="pie_timer" width="'+settings.height+'" height="'+settings.height+'">'+settings.seconds+'</canvas>');var val=360;interval=setInterval(timer,40);function timer(){var canvas=document.getElementById('pie_timer');if(canvas.getContext){val-=(360/settings.seconds)/24;if(val<=0){clearInterval(interval);canvas.width=canvas.width;if(typeof callback=='function'){callback.call();}}else{canvas.width=canvas.width;var ctx=canvas.getContext('2d');var canvas_size=[canvas.width,canvas.height];var radius=Math.min(canvas_size[0],canvas_size[1])/2;var center=[canvas_size[0]/2,canvas_size[1]/2];ctx.beginPath();ctx.moveTo(center[0],center[1]);var start=(3*Math.PI)/2;ctx.arc(center[0],center[1],radius,start-val*(Math.PI/180),start,false);ctx.closePath();ctx.fillStyle=settings.color;ctx.fill();}}}return this;};})(jQuery); var isMSIE = /*@cc_on!@*/0; if(isMSIE){function ticker(){document.getElementById('pie_to_be').innerHTML=parseInt(document.getElementById('pie_to_be').innerHTML)-1;} setInterval("ticker()",1000);setTimeout("$('#caspioform').submit()",myseconds*1000);}


    </script>

@stop
