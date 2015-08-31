<div class="col-md-8" style="background-color: #dedef8; border-radius:5px; padding: 20px">
    <h1>Activity Form</h1>

    {!! Form::open(array('url' => 'process/', 'method' => 'post')) !!}
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="form-group">
        {!! Form::label('car', 'Car') !!}
        {!! Form::select('car', $cars, null, array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('date', 'Date') !!}
        {!! Form::input('date', 'date', Carbon\Carbon::now()->format('Y-m-d') , array('class' => 'form-control')) !!}
    </div>



    <div class="form-group">
        {!! Form::label('type', 'Type') !!}
        {!! Form::select('type', ['1'=>'On Day', '2'=>'Maintenance', '3'=>'Nil'], null, array('class' => 'form-control')) !!}
    </div>

        {!! Form::submit('Submit', ['class' => 'btn btn-default']) !!}

        {!! Form::close() !!}
</div>
