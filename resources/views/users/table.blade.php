<div class="table-responsive-sm">
    <table class="table table-striped" id="users-table">
        <thead>
            <th>Fullname</th>
        <th>Username</th>
        <th>Email</th>
        <th>Position</th>
        <th>Phoneno</th>
        <th>Address</th>
            <th colspan="3">Action</th>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{!! $user->name !!}</td>
            <td>{!! $user->username !!}</td>
            <td>{!! $user->email !!}</td>
            <td>{!! $user->position !!}</td>
            <td>{!! $user->phoneNo !!}</td>
            <td>{!! $user->address !!}</td>
                <td>
                    {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('users.show', [$user->id]) !!}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{!! route('users.edit', [$user->id]) !!}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
