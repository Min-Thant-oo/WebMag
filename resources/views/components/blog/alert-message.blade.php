<div>
    @if(session('error'))
        <div class="alert alert-error">
            @if(is_array(session('error')))
                <ul>
                    @foreach(session('error') as $message)
                        <li> {{ $message }}</li>
                    @endforeach
                </ul>
            @else
                {{ session('error') }}
            @endif
        </div>
    @endif

    @if(session('success'))
        <div class="alert alert-success">
            @if(is_array(session('success')))
                <ul>
                    @foreach(session('success') as $message)
                        <li> {{ $message }}</li>
                    @endforeach
                </ul>
            @else
                {{ session('success') }}
            @endif
        </div>
    @endif
</div>
