{!! Form::open(['route' => 'search', 'method' => 'get']) !!}
    {!! Form::label('q', 'Keyword:', ['class' => 'control-label']) !!}
    <br>
	{!! Form::text('q', null, ['class' => 'form-control']) !!}
    <br><br><br>
    {!! Form::submit('Submit', ['class' => 'form-control']) !!}
{!! Form::close() !!}