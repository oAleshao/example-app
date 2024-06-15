<div class="mt-3">
    {!! Form::label('book_id', 'Book', ['class'=>'form-label']) !!}
    {!! Form::select('book_id', $books, null, ['class' => 'form-control']) !!}
</div>

<div class="mt-3">
    {!! Form::label('data', 'Your review', ['class'=>'form-label']) !!}
    {!! Form::textarea('data', null, ['class' => 'form-control']) !!}
</div>

{!! Form::submit('Save', ['class' => 'btn btn-primary mt-3']) !!}
