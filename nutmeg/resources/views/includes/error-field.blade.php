@if(count($errors) > 0)
    <div class='row ml-2'>
        <div class='col-6 pl-3 ml-3 mt-4 alert alert-danger'>
            ATTENTION:
            <ul class='mb-0'>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
