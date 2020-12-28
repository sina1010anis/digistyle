@if ($errors->any())
    <div class="Error-New-Comment-One-Product">
        <ul>
            @foreach ($errors->all() as $error)
                <li>
                    {{$error}}
                </li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('msg'))
    <div class="Success-New-Comment-One-Product">
        {{session('msg')}}
    </div>
@endif
