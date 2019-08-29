<nav class="navbar navbar-default  navbar-fixed-bottom">
    <div class="container-fluid">
        <div class="navbar-header">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link {{Request::path() == '/' ? 'active' : ''}}" id="home-tab" data-toggle="tab" href="{{url('/')}}" role="tab" aria-controls="home" aria-selected="true">Home</a>
                    </li>
                    <li class="nav-item " >
                        <a class="nav-link {{Request::path() == 'editor-hero/create' ? 'active' : ''}}" id="contact-tab" data-toggle="tab" href="{{URL::route('editor-hero.create')}}" role="tab" aria-controls="contact" aria-selected="false">Create</a>
                    </li>
                </ul>
        </div>
    </div>
</nav>

