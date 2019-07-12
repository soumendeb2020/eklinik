@if($data)
<ul id="country-list">
    @foreach($data as $d)
        <li onclick="getCompanyDetail('{{$d->id}}', '{{$d->name}}', '{{$d->addr1}}', '{{$d->addr2}}', '{{$d->addr3}}')">{{$d->name}}</li>
    @endforeach
</ul>
@endif

<script>
    // AJAX call for autocomplete 
    function getCompanyDetail(id, name, addr1, addr2, addr3 ){
        $("#companyname").val(name);
        $("#suggesstion-box").hide();
        
        $('#country-list').css('display', 'none');
        $('#addr1').val(addr1);
        $('#addr2').val(addr2);
        $('#addr3').val(addr3);
        getCompanyEmployees(id);
    }
    function getCompanyEmployees(id){
        var ids = id;
        url = "{!! URL::to('getExistingEmpListById') !!}";
        $.ajax({
            type: "POST",
            url: url,
            async: false,
            data: {_token: "{{ csrf_token() }}", ids: ids},
            beforeSend: function () {
                //$("#search-box").css("background", "#FFF url(LoaderIcon.gif) no-repeat 165px");
            },
            success: function (data) {
                $('.newEmpDt').html(data);
            }
        });
    }
</script> 