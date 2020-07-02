<!DOCTYPE html>
<html>



<head >
    @include('partials.head')
</head>

<body id="g" class="header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden login-page">

    @include('partials.analytics')

    <div>
        @include('partials.header')
    </div>

    <div ></div>

    <div >
        <div >
            @include('partials.sidebar')
        </div>

        <div >
            <div >

                @if(isset($siteTitle))
                    <h3 >
                        {{ $siteTitle }}
                    </h3>
                @endif

                <div >
                    <div >

                        @if (Session::has('message'))
                            <div >
                                <p>{{ Session::get('message') }}</p>
                            </div>
                        @endif
                        @if ($errors->count() > 0)
                            <div >
                                <ul >
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @yield('content')

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div >
        <i></i>
    </div>

    {!! Form::open(['route' => 'auth.logout', 'style' => 'display:none;', 'id' => 'logout']) !!}
        <button type="submit">Logout</button>
    {!! Form::close() !!}

    @include('partials.javascripts')
</body>
</html>