@extends('layouts.app')

@section('content')

    <style>

        #reemawi {
            background-color: #0000ff;
            color: white;
            font-size: 20px;
            margin-left: 800px;

        }

        #grad1 {
            height: 2000px;
            background-color: pink;



        }
    </style>

    <div class="panel panel-default"  id="grad1">
        <div class="panel-heading">
            @lang('quickadmin.view-result')
        </div>

        <div class="panel-body" >
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered table-striped">
                        @if(Auth::user()->isAdmin())
                        <tr>
                            <th>@lang('quickadmin.results.fields.user')</th>
                            <td>{{ $test->user->name or '' }} ({{ $test->user->email or '' }})</td>
                        </tr>
                        @endif
                        <tr>
                            <th>@lang('quickadmin.results.fields.date')</th>
                            <td>{{ $test->created_at or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.results.fields.result')</th>
                            <td>{{ $test->result }}/10</td>
                        </tr>
                    </table>
                <?php $i = 1 ?>
                @foreach($results as $result)
                    <table class="table table-bordered table-striped">
                        <tr class="test-option{{ $result->correct ? '-true' : '-false' }}">
                            <th style="width: 10%">Question #{{ $i }}</th>
                            <th>{{ $result->question->question_text or '' }}</th>
                        </tr>
                        @if ($result->question->code_snippet != '')
                            <tr>
                                <td>Code snippet</td>
                                <td><div class="code_snippet" >{!! $result->question->code_snippet !!}</div></td>
                            </tr>
                        @endif
                        <tr>
                            <td>Options</td>
                            <td>
                                <ul>
                                @foreach($result->question->options as $option)
                                    <li style="@if ($option->correct == 1) font-weight: bold; background-color: green  @endif
                                        @if ($result->option_id == $option->id) text-decoration: underline @endif">{{ $option->option }}
                                        @if ($option->correct == 1) <em> <i class="fa fa-check-square"></i>(correct answer)</em> @endif
                                        @if ($result->option_id == $option->id) <em>(your answer)</em> @endif
                                    </li>
                                @endforeach
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td style="color: red">Answer Explanation</td>
                            <td>
                            {!! $result->question->answer_explanation  !!}
                                @if ($result->question->more_info_link != '')
                                    <br>
                                    <br>
                                    Read more:
                                    <a href="{{ $result->question->more_info_link }}" target="_blank">{{ $result->question->more_info_link }}</a>
                                @endif
                            </td>
                        </tr>
                    </table>
                <?php $i++ ?>
                @endforeach
                </div>
            </div>

            <p>&nbsp;</p>
            <div class="panel-body">
                <div class="form-group">

                    <div class="col-md-6">

                        <a href="{{ route('tests.index') }}" class="btn btn-default" id="reemawi"><i class="fa fa-question" style="color: red"></i><b>Take another quiz</b></a>

                    </div>
                </div>
                <h2>.........................................................................................................................................................................................................................................................................................................................
                </h2>
                <div class="form-group">

                    <div class="col-md-6">

                        <a href="{{ route('results.index') }}" class="btn btn-default" id="reemawi"><i class="fa fa-arrow-circle-o-right" style="color: red"></i><b>See all my results</b></a>

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
