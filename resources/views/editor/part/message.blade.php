<script>
    function Close_button(text, aler) {

        var team_div = document.getElementById('team_div');
        var container = document.createElement("div");
        container.className = 'hide alert '+aler+'';
        container.role = 'alert';
        container.id= 'hide';
        container.innerHTML = '<button type="button" class="close" id="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" >x</span>' +
            '</button>'+
            ''+text+'';
        team_div.appendChild(container);
    }
</script>
    @if(session('success'))
        <div class="row justify-content-center">
            <div class="col-md-11 " id="team_div">
                    <script>
                        var messAler = 'alert-success';
                        var mess = {!! json_encode(Session::get('success')) !!}
                        Close_button(mess, messAler);
                    </script>
            </div>
        </div>
    @endif

    @if($errors->any())

        <div class="row justify-content-center">
            <div class="col-md-11" id="team_div">
                  <script>
                       var messAler = 'alert-danger';
                       var mess = {!! json_encode($errors->first()) !!}
                       Close_button(mess, messAler);
                  </script>
            </div>
        </div>
    @endif

<script>
    document.getElementById("hide").onclick =  function () {
        console.log('hi');
        var test =  document.getElementsByClassName('hide')[0];
        if(test){
            test.parentNode.removeChild(test);
        }
    }
</script>
