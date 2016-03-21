<div class="row">
    <div class="col-lg-6">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Add Item Form</h5>
            </div>
            <div class="ibox-content">
                {!! Form::open(array('url' => 'process/maintenance/item', 'method' => 'post')) !!}
                {!! Form::hidden('maintenance_id', $maintenance_id) !!}

                <div class="form-group">
                    {!! Form::label('item', 'Item') !!}
                    <br>
                    {!! Form::select('item', $items, null, array('class' => 'chosen-select' , 'style' => 'width:488px;')) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('cost', 'Cost') !!}
                    {!! Form::text('cost', null, array('class' => 'form-control')) !!}
                </div>

                <div>
                    <button class="btn btn-sm btn-primary m-t-n-xs" type="submit">
                        <strong>Add Item</strong>
                    </button>
                </div>
                {!! Form::close() !!}
            </div>
            <div class="ibox-title">
                <h5>Maintenance Form</h5>
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
                    {!! Form::text('comment', null, array('class' => 'form-control')) !!}
                </div>

                <div>
                    <button class="btn btn-sm btn-primary m-t-n-xs" type="submit">
                        <strong>Submit</strong>
                    </button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Add Item Name Form</h5>
            </div>
            <div class="ibox-content">
                {!! Form::open(array('url' => '/process/maintenance/item-name', 'method' => 'post')) !!}
                {!! Form::hidden('maintenance_id', $maintenance_id) !!}

                <div class="form-group">
                    {!! Form::label('name', 'Item Name') !!}
                    {!! Form::text('name', null, array('class' => 'form-control')) !!}
                </div>

                <div>
                    <button class="btn btn-sm btn-primary m-t-n-xs" type="submit">
                        <strong>Add Item Name</strong>
                    </button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
        <div class="ibox float-e-margins">
            <div class="ibox-content">
                @if(count($costs) > 0)
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Item</th>
                            <th>Cost</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
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
                        </tbody>
                    </table>
                @endif
                <br>
                Total Cost: ৳ {!!number_format(floatval(App\Activity::find($activity->id)->maintenance->cost)) !!}
            </div>
        </div>
    </div>
</div>

<div class="row">

</div>

{{--<div class="col-md-8" style="background-color: #dedef8; border-radius:5px; padding: 20px">--}}

    {{--<a href="/activity/{{ $activity->id }}/delete">--}}
        {{--<button type="button" class="btn btn-default" aria-label="Close">--}}
            {{--<span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>--}}
        {{--</button>--}}
    {{--</a>--}}

    {{--<h1>Maintenance Form</h1>--}}

    {{--Car Name: {!! $activity->car->name !!} <br>--}}
    {{--Date: {!! $activity->date->format('d-M-y') !!}--}}
        {{--<br>--}}
    {{--@if(count($costs) > 0)--}}
        {{--<table class="table table-bordered" style="background-color: white">--}}
        {{--<tr>--}}
            {{--<th>Item</th>--}}
            {{--<th>Cost</th>--}}
            {{--<th>Action</th>--}}
        {{--</tr>--}}
        {{--@foreach($costs as $cost)--}}
                {{--<tr>--}}
                    {{--<td>{{$cost->name}}</td>--}}
                    {{--<td>{{$cost->pivot->cost}}</td>--}}
                    {{--<td>--}}
                        {{--<a href="/process/maintenance/item/{{$cost->pivot->id}}/delete?maintenance_id={{$maintenance_id}}">--}}
                            {{--<button type="button" class="btn btn-default" aria-label="Delete">--}}
                                {{--<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>--}}
                            {{--</button>--}}
                        {{--</a>--}}
                    {{--</td>--}}
                {{--</tr>--}}
        {{--@endforeach--}}
        {{--</table>--}}
    {{--@endif--}}

    {{--add item form--}}
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

    {{--<div>Total Cost: ৳ {!!number_format(floatval(App\Activity::find($activity->id)->maintenance->cost)) !!}</div>--}}
    {{--Add item name form --}}
    {{--{!! Form::open(array('url' => '/process/maintenance/item-name', 'method' => 'post')) !!}--}}
    {{--{!! Form::hidden('maintenance_id', $maintenance_id) !!}--}}

    {{--<div class="form-group">--}}
        {{--{!! Form::label('name', 'Item Name') !!}--}}
        {{--{!! Form::text('name', null, array('class' => 'form-control')) !!}--}}
    {{--</div>--}}

    {{--{!! Form::submit('Add Item Name', ['class' => 'btn btn-default']) !!}--}}
    {{--{!! Form::close() !!}--}}


    {{--Maintenance form --}}
    {{--{!! Form::open(array('url' => 'process/maintenance', 'method' => 'post', 'files'=>true)) !!}--}}
    {{--<div class="control-group">--}}
        {{--<div class="controls">--}}
            {{--{!! Form::file('image') !!}--}}
            {{--<p class="errors">{!!$errors->first('image')!!}</p>--}}
            {{--@if(Session::has('error'))--}}
                {{--<p class="errors">{!! Session::get('error') !!}</p>--}}
            {{--@endif--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<div id="success"> </div>--}}
    {{--{!! Form::hidden('activity_id', $activity->id) !!}--}}
    {{--<div class="form-group">--}}
        {{--{!! Form::label('comment', 'Comment') !!}--}}
        {{--{!! Form::textArea('comment', null, array('class' => 'form-control')) !!}--}}
    {{--</div>--}}



    {{--{!! Form::submit('Submit', ['class' => 'btn btn-default']) !!}--}}

    {{--{!! Form::close() !!}--}}
{{--</div>--}}