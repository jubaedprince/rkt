<div class="col-md-8" style="background-color: #dedef8; border-radius:5px; padding: 20px">

    <h1>Maintenance Form</h1>
    Car Name: {!! $activity->car->name !!} <br>
    Date: {!! $activity->date !!}
    {!! Form::open(array('url' => 'process/maintenance', 'method' => 'post')) !!}
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {!! Form::hidden('activity_id', $activity->id) !!}

    <div class="form-group">
        {!! Form::label('cost', 'Cost') !!}
        {!! Form::text('cost', null, array('class' => 'form-control')) !!}
    </div>


    <div class="form-group">
        {!! Form::label('comment', 'Comment') !!}
        {!! Form::textArea('comment', null, array('class' => 'form-control')) !!}
    </div>

    {!! Form::submit('Submit', ['class' => 'btn btn-default']) !!}

    {!! Form::close() !!}

    {{--<h1>Maintenance Form</h1>--}}
    {{--{!! $activity->id !!}--}}
    {{--{!! Form::open(array('url' => 'process/maintenance/item', 'method' => 'post')) !!}--}}
    {{--{!! Form::hidden('maintenance_id', $maintenance_id) !!}--}}

    {{--<div class="form-group">--}}
        {{--{!! Form::label('item', 'Item') !!}--}}
        {{--{!! Form::select('item', $items, null, array('class' => 'form-control')) !!}--}}
    {{--</div>--}}

    {{--<div class="form-group">--}}
        {{--{!! Form::label('cost', 'Cost') !!}--}}
        {{--{!! Form::text('cost', null, array('class' => 'form-control')) !!}--}}
    {{--</div>--}}

    {{--{!! Form::submit('Add Item', ['class' => 'btn btn-default']) !!}--}}
    {{--{!! Form::close() !!}--}}

    {{--{!! Form::open(array('url' => 'process/maintenance', 'method' => 'post')) !!}--}}
    {{--{!! Form::hidden('activity_id', $activity->id) !!}--}}
    {{--<div class="form-group">--}}
        {{--{!! Form::label('comment', 'Comment') !!}--}}
        {{--{!! Form::textArea('comment', null, array('class' => 'form-control')) !!}--}}
    {{--</div>--}}

    {{--{!! Form::submit('Submit', ['class' => 'btn btn-default']) !!}--}}

    {{--{!! Form::close() !!}--}}
</div>