@section('breadcrumb')
<ol class="breadcrumb">
    <li class="active">
        <strong>MMM</strong>
    </li>
</ol>
@endsection


<div class="row">
    <div class="col-lg-6">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Maintenance Form</h5>
                <div class="ibox-tools" style="font-size: 13px">
                    <a href="#">
                        Truck: <div class="badge badge-primary" style="font-size: 13px">{!! $activity->car->name !!}</div> 
                    </a>
                    <a href="#">
                        Date: <div class="badge badge-primary" style="font-size: 13px">{!! $activity->date->format('d-M-y') !!}</div>
                    </a>
                </div>
            </div>

            <div class="ibox-content">
                {!! Form::open(array('url' => 'process/maintenance/item', 'method' => 'post')) !!}
                {!! Form::hidden('maintenance_id', $maintenance_id) !!}

                <div class="form-group">
                    {!! Form::label('item', 'Select item') !!}
                    <br>
                    {!! Form::select('item', $items, null, array('class' => 'chosen-select' , 'style' => 'width:488px;')) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('cost', 'Cost of the item') !!}
                    {!! Form::text('cost', null, array('class' => 'form-control')) !!}
                </div>

                <div>
                    <button class="btn btn-sm btn-primary m-t-n-xs" type="submit">
                        <strong>Add item</strong>
                    </button>
                </div>
                {!! Form::close() !!}
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
                    {!! Form::textarea('comment', null, array('class' => 'form-control' , 'style' => 'resize:none')) !!}
                </div>

                <div>
                    <button class="btn btn-sm btn-primary btn-block m-t-n-xs" type="submit">
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
                <h5>Item cost list</h5>
            </div>
            <div class="ibox-content">
                <!-- @if(count($costs) > 0) -->
                <table class="table table-striped table-bordered table-hover dataTables-example">
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
                                    <button type="button" class="btn btn-default btn-delete" aria-label="Delete">
                                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                    </button>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- @endif -->
                <br>
                <h4>Total Cost: ৳ {!!number_format(floatval(App\Activity::find($activity->id)->maintenance->cost)) !!}</h4>
            </div>

            <div class="ibox-content">
                {!! Form::open(array('url' => '/process/maintenance/item-name', 'method' => 'post')) !!}
                {!! Form::hidden('maintenance_id', $maintenance_id) !!}

                <div class="form-group">
                    {!! Form::label('name', 'Add new item') !!}
                    {!! Form::text('name', null, array('class' => 'form-control')) !!}
                </div>

                <div>
                    <button class="btn btn-sm btn-primary m-t-n-xs" type="submit">
                        <strong>Add item name</strong>
                    </button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
