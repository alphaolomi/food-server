<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    <p>{{ $food->title }}</p>
</div>

<!-- Subtitle Field -->
<div class="form-group">
    {!! Form::label('subTitle', 'Subtitle:') !!}
    <p>{{ $food->subTitle }}</p>
</div>

<!-- Info Field -->
<div class="form-group">
    {!! Form::label('info', 'Info:') !!}
    <p>{{ $food->info }}</p>
</div>

<!-- Price Field -->
<div class="form-group">
    {!! Form::label('price', 'Price:') !!}
    <p>{{ $food->price }}</p>
</div>

<!-- Rating Field -->
<div class="form-group">
    {!! Form::label('rating', 'Rating:') !!}
    <p>{{ $food->rating }}</p>
</div>

