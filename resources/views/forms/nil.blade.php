<div class="col-lg-7">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Nil Form</h5>
            <div class="ibox-tools">
                <a href="#">
                    Truck: <div class="badge badge-primary">{!! $activity->car->name !!}</div>
                </a>
                <a href="#">
                    Date: <div class="badge badge-primary">{!! $activity->date->format('d-M-y') !!}</div>
                </a>

                <a href="/activity/{{ $activity->id }}/delete" class="close-link">
                    <i class="fa fa-times"></i>
                </a>
            </div>
        </div>
        <div class="ibox-content">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="row">
                <div class="col-sm-6 b-r">
                    {!! Form::open(array('url' => 'process/nil', 'method' => 'post')) !!}
                    {!! Form::hidden('activity_id', $activity->id) !!}
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Cost</label>
                        {!! Form::text('cost', null, array('class' => 'form-control')) !!}
                    </div>
                    <div class="form-group">
                        <label>Comment</label>
                        {!! Form::text('comment', null, array('class' => 'form-control')) !!}
                    </div>

                    <div>
                        <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit">
                            <strong>Submit</strong>
                        </button>
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>


{{--<div class="col-md-8" style="background-color: #dedef8; border-radius:5px; padding: 20px">--}}
    {{--<a href="/activity/{{ $activity->id }}/delete">--}}
        {{--<button type="button" class="btn btn-default" aria-label="Close">--}}
            {{--<span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>--}}
        {{--</button>--}}
    {{--</a>--}}

    {{--<h1>Nil Form</h1>--}}

    {{--Car Name: {!! $activity->car->name !!} <br>--}}
    {{--Date: {!! $activity->date !!}--}}
    {{--{!! Form::open(array('url' => 'process/nil', 'method' => 'post')) !!}--}}
    {{--@if (count($errors) > 0)--}}
        {{--<div class="alert alert-danger">--}}
            {{--<ul>--}}
                {{--@foreach ($errors->all() as $error)--}}
                    {{--<li>{{ $error }}</li>--}}
                {{--@endforeach--}}
            {{--</ul>--}}
        {{--</div>--}}
    {{--@endif--}}
    {{--{!! Form::hidden('activity_id', $activity->id) !!}--}}

    {{--<div class="form-group">--}}
        {{--{!! Form::label('cost', 'Cost') !!}--}}
        {{--{!! Form::text('cost', null, array('class' => 'form-control')) !!}--}}
    {{--</div>--}}


    {{--<div class="form-group">--}}
        {{--{!! Form::label('comment', 'Comment') !!}--}}
        {{--{!! Form::textArea('comment', null, array('class' => 'form-control')) !!}--}}
    {{--</div>--}}

    {{--{!! Form::submit('Submit', ['class' => 'btn btn-default']) !!}--}}

    {{--{!! Form::close() !!}--}}
{{--</div>--}}