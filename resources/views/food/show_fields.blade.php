<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $food->name }}</p>
</div>

<!-- Sub Name Field -->
<div class="form-group">
    {!! Form::label('sub_name', 'Sub Name:') !!}
    <p>{{ $food->sub_name }}</p>
</div>

<!-- Is Active Field -->
<div class="form-group">
    {!! Form::label('is_active', 'Is Active:') !!}
    <p>{{ $food->is_active }}</p>
</div>

<!-- Is Available Field -->
<div class="form-group">
    {!! Form::label('is_available', 'Is Available:') !!}
    <p>{{ $food->is_available }}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $food->description }}</p>
</div>

<!-- Price Field -->
<div class="form-group">
    {!! Form::label('price', 'Price:') !!}
    <p>{{ $food->price }}</p>
</div>

