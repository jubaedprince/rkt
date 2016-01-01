<div class="col-md-8" style="background-color: #dedef8; border-radius:5px; padding: 20px">

    <a href="/activity/{{ $activity->id }}/delete">
        <button type="button" class="btn btn-default" aria-label="Close">
            <span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>
        </button>
    </a>

    {{--<h1>Maintenance Form</h1>--}}
    {{--Car Name: {!! $activity->car->name !!} <br>--}}
    {{--Date: {!! $activity->date->format('d-M-y') !!}--}}
    {{--{!! Form::open(array('url' => 'process/maintenance', 'method' => 'post')) !!}--}}
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

{{--    {{App\Maintenance::find($maintenance_id)->items}}--}}
    <h1>Maintenance Form</h1>

    Car Name: {!! $activity->car->name !!} <br>
    Date: {!! $activity->date->format('d-M-y') !!}
        <br>
    @if(count($costs) > 0)
        <table class="table table-bordered" style="background-color: white">
        <tr>
            <th>Item</th>
            <th>Cost</th>
            <th>Action</th>
        </tr>
        @foreach($costs as $cost)
                <tr>
                    <td>{{$cost->name}}</td>
                    <td>{{$cost->pivot->cost}}</td>
                    <td>
                        <a href="/process/maintenance/item/{{$cost->pivot->id}}/delete?maintenance_id={{$maintenance_id}}">
                            <button type="button" class="btn btn-default" aria-label="Delete">
                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                            </button>
                        </a>
                    </td>
                </tr>
        @endforeach
        </table>
    @endif

    {{--add item form--}}
    {!! Form::open(array('url' => 'process/maintenance/item', 'method' => 'post')) !!}
    {!! Form::hidden('maintenance_id', $maintenance_id) !!}

    <div class="form-group">
        {!! Form::label('item', 'Item') !!}
        {!! Form::select('item', $items, null, array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('cost', 'Cost') !!}
        {!! Form::text('cost', null, array('class' => 'form-control')) !!}
    </div>

    {!! Form::submit('Add Item', ['class' => 'btn btn-default']) !!}
    {!! Form::close() !!}

    <div>Total Cost: ৳ {!!number_format(floatval(App\Activity::find($activity->id)->maintenance->cost)) !!}</div>
    {{--Add item name form --}}
    {!! Form::open(array('url' => '/process/maintenance/item-name', 'method' => 'post')) !!}
    {!! Form::hidden('maintenance_id', $maintenance_id) !!}

    <div class="form-group">
        {!! Form::label('name', 'Item Name') !!}
        {!! Form::text('name', null, array('class' => 'form-control')) !!}
    </div>

    {!! Form::submit('Add Item Name', ['class' => 'btn btn-default']) !!}
    {!! Form::close() !!}


    {{--Maintenance form --}}
    {!! Form::open(array('url' => 'process/maintenance', 'method' => 'post', 'files'=>true)) !!}
    <div class="control-group">
        <div class="controls">
            {!! Form::file('image') !!}
            <p class="errors">{!!$errors->first('image')!!}</p>
            @if(Session::has('error'))
                <p class="errors">{!! Session::get('error') !!}</p>
            @endif
        </div>
    </div>
    <div id="success"> </div>
    {!! Form::hidden('activity_id', $activity->id) !!}
    <div class="form-group">
        {!! Form::label('comment', 'Comment') !!}
        {!! Form::textArea('comment', null, array('class' => 'form-control')) !!}
    </div>



    {!! Form::submit('Submit', ['class' => 'btn btn-default']) !!}

    {!! Form::close() !!}
</div>