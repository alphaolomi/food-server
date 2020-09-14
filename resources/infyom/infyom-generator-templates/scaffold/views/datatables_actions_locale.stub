{!! Form::open(['route' => ['$ROUTE_NAMED_PREFIX$$MODEL_NAME_PLURAL_CAMEL$.destroy', $$PRIMARY_KEY_NAME$], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('$ROUTE_NAMED_PREFIX$$MODEL_NAME_PLURAL_CAMEL$.show', $$PRIMARY_KEY_NAME$) }}" class='btn btn-ghost-success'>
       <i class="fa fa-eye"></i>
    </a>
    <a href="{{ route('$ROUTE_NAMED_PREFIX$$MODEL_NAME_PLURAL_CAMEL$.edit', $$PRIMARY_KEY_NAME$) }}" class='btn btn-ghost-info'>
       <i class="fa fa-edit"></i>
    </a>
    {!! Form::button('<i class="fa fa-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-ghost-danger',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!}
</div>
{!! Form::close() !!}
