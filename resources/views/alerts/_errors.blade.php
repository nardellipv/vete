@if (count($errors) > 0)
    @foreach ($errors->all() as $error)
        <div class="alert alert-warning alert-styled-left">
            <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span>
            </button>
            <span>{{ $error }}</span>
        </div>
    @endforeach
@endif