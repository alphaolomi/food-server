<div class="row">
    <div class="col-8">
        <table class="table table-stripe table-bordered">
    <tbody>
        <tr>
            <td></td>
            <td></td>
        </tr>


<tr>
    <td>{!! Form::label('name', 'Name:') !!}</td>
    <td><p>{{ $food->name }}</p></td>
</div>


<tr>
    <td>{!! Form::label('sub_name', 'Sub Name:') !!}</td>
    <td><p>{{ $food->sub_name }}</p></td>
</div>


<tr>
    <td>{!! Form::label('is_active', 'Is Active:') !!}</td>
    <td><p>{{ $food->is_active }}</p></td>
</div>


<tr>
    <td>{!! Form::label('is_available', 'Is Available:') !!}</td>
    <td><p>{{ $food->is_available }}</p></td>
</div>


<tr>
    <td>{!! Form::label('description', 'Description:') !!}</td>
    <td><p>{{ $food->description }}</p></td>
</div>


<tr>
    <td>{!! Form::label('price', 'Price:') !!}</td>
    <td><p>TZS {{ $food->price }}/=</p></td>
</div>


    </tbody>
</table>



    </div>

    <div class="col-4">
    <table class="table table-light table-bordered">
        <tbody>
            <tr>
                <td>
                </td>
            </tr>
        </tbody>
    </table>
    </div>

</div>
