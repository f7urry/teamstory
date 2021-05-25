@if ($message = Session::get('message'))
    @if(strpos(strtolower($message),"error") !== false)
        <div class="alert alert-block alert-danger mt-2">
    @endif
    @if(strpos(strtolower($message),"warning") !== false)
        <div class="alert alert-block alert-warning mt-2">
    @endif
    @if(strpos(strtolower($message),"info") !== false)
        <div class="alert alert-block alert-info mt-2">
    @endif
    @if(strpos(strtolower($message),"success") !== false)
        <div class="alert alert-block alert-success mt-2">
    @endif
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>{{ ucfirst($message) }}</strong>
    </div>
@endif
