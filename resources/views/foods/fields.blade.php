<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Subtitle Field -->
<div class="form-group col-sm-6">
    {!! Form::label('subTitle', 'Subtitle:') !!}
    {!! Form::text('subTitle', null, ['class' => 'form-control']) !!}
</div>

<!-- Info Field -->
{{-- <div class="form-group col-sm-12 col-lg-12"> --}}
    <div class="form-group col-sm-6">
    {!! Form::label('info', 'Info:') !!}
    {!! Form::textarea('info', null, ['class' => 'form-control','rows' =>3]) !!}
</div>

<!-- Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('price', 'Price:') !!}
    {!! Form::number('price', null, ['class' => 'form-control']) !!}
</div>

<!-- Rating Field -->
<div class="form-group col-sm-6">
    {!! Form::label('rating', 'Rating:') !!}
    {!! Form::number('rating', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ URL::previous() }}" class="btn btn-secondary">Cancel</a>
</div>
