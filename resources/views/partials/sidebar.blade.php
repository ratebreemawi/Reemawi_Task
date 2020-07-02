@inject('request', 'Illuminate\Http\Request')
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    .dropdown {
        float: left;
        overflow: hidden;
    }


    .dropdown .dropbtn {
        font-size: 16px;
        border: none;
        outline: none;
        color: white;
        padding: 14px 16px;
        background-color: inherit;
        font-family: inherit;
        margin: 0;
    }

    a:link {
        color: red;
    }

    /* visited link */
    a:visited {
        color: red;
    }

    /* mouse over link */
    a:hover {
        color: green;
    }

    /* selected link */
    a:active {
        color: yellow;
    }
    div.navbar {
        background-color: #333;
        overflow: auto;
        white-space: nowrap;
    }

    div.navbar a {
        display: inline-block;
        color: white;
        text-align: center;
        padding: 14px;
        text-decoration: none;
    }


    div.navbar a:hover, .dropdown:hover .dropbtn {
        background-color: red;
    }
    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
    }

    .dropdown-content a {
        float: none;
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        text-align: left;
    }

    .dropdown-content a:hover {
        background-color: red;
    }

    .dropdown:hover .dropdown-content {
        display: block;
    }
    #rateb{
        font-size: 50px;
        width: 50px;
    }

</style>





    <div  class="navbar" >

                <a href="{{ route('tests.index') }}">Start New Quiz Now</a>



        <a href="{{ route('results.index') }}">See Result</a>

        <div class="dropdown">
            <a href="{{ url('/') }}">
                <i class="fa fa-home" id="rateb"></i>

            </a>
            <div class="dropdown-content">






            </div>
        </div>

        <div class="dropdown" >
            <button class="dropbtn" >My Account
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">



                <a href="#logout" onclick="$('#logout').submit();" style="color: black">
                    <i class="fa fa-arrow-left"></i>
                    Logout
                </a>

            </div>
        </div>


            @if(Auth::user()->isAdmin())

                <a href="{{ route('topics.index') }}">

                    Main Topics
                </a>


                <a href="{{ route('questions.index') }}">

                    Questions
                </a>

                <a href="{{ route('questions_options.index') }}">

                    Options
                </a>






    <div class="dropdown"  >
        <button class="dropbtn" >User Management
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">


                   <div >
                        <a href="{{ route('roles.index') }}" style="color: black">
                           Roles
                        </a>



                        <a href="{{ route('users.index') }}" style="color: black">
                           Users
                        </a>


                        <a href="{{ route('user_actions.index') }}" style="color: black ">
                          Users Actions
                        </a>
                   </div>
        </div>
    </div>
    </div>


</div>
            @endif





    <div style="margin-left:25%">







    </div>
{!! Form::open(['route' => 'auth.logout', 'style' => 'display:none;', 'id' => 'logout']) !!}
<button type="submit">@lang('quickadmin.logout')</button>
{!! Form::close() !!}
