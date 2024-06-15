<div class="mt-3">
    {!! Form::label('name', 'Book Name:', ['class' => 'form-label']) !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="mt-3">
    {!! Form::label('description', 'Book Description:', ['class' => 'form-label']) !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<div class="mt-3">
    {!! Form::label('genre_id', 'Book genre:', ['class' => 'form-label']) !!}
    {!! Form::select('genre_id', $genres, null, ['class' => 'form-control']) !!}
</div>

<div class="mt-3">
    {!! Form::label('image', 'Book image:', ['class' => 'form-label']) !!}
    {!! Form::file('image', ['class' => 'form-control']) !!}
</div>


<div class="mt-3">
    {!! Form::label('books', 'Book recommended:', ['class' => 'form-label']) !!}
    {!! Form::select('books[]', $books, null, ['class' => 'form-control', 'multiple'=>true]) !!}
</div>



{!! Form::submit('Save', ['class' => 'btn btn-primary mt-3']) !!}