<div id="action-{{$action_id}}" class="action-column" data-id="{{$action_id}}">
    @if(isset($show_url))
        <span class="action-show">
            <a href='{{ $show_url }}' class='btn btn-info' ><i class='fa fa-eye'></i></a>
        </span>
    @endif
    @if(isset($edit_url))
        <span class="action-edit">
            <a href='{{ $edit_url }}' class='btn btn-secondary' ><i class='fa fa-pen'></i></a>
        </span>
    @endif
    @if(isset($delete_url))
        <span class="action-delete">
            <a class='btn btn-danger btn-delete' href='#' data-href='{{ $delete_url }}' data-message='Anda yakin untuk menghapus data ini?'><i class='fa fa-trash'></i></a>
        </span>
    @endif
</div>