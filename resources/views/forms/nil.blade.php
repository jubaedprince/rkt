<div class="col-lg-7">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Off day form</h5>
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
                        {!! Form::textarea('comment', null, array('class' => 'form-control' , 'style' => 'resize:none')) !!}
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

