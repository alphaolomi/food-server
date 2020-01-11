<div class="table-responsive-sm">
    <table class="table table-striped" id="foods-table">
        <thead>
            <th>Title</th>
        <th>Subtitle</th>
        <th>Info</th>
        <th>Price</th>
        <th>Rating</th>
            <th colspan="3">Action</th>
        </thead>
        <tbody>
        @foreach($foods as $food)
            <tr>
                <td>{{ $food->title }}</td>
            <td>{{ $food->subTitle }}</td>
            <td>{{ $food->info }}</td>
            <td>{{ $food->price }}</td>
            <td>{{ $food->rating }}</td>
                <td>
                    {!! Form::open(['route' => ['foods.destroy', $food->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('foods.show', [$food->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('foods.edit', [$food->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>