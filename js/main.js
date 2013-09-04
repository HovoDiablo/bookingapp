function getDestinations(query,process,action) {
    $.ajax({
        url:'/request.php',
        type:'post',
        dataType:'json',
        data:{search:query,action:action},
        success:function(data){
             return data;
        }
    });
}

function onAutocompleted($e, datum) {
    $('input[name="destinationId"]').val(datum['destinationId']);

}

$(document).ready(function() {

    checkInOut('#arrivalDate','#departureDate');
    roomLive();

    $('#searchByDestination').typeahead({
        limit: 5,
        valueKey: 'Destination',
        remote: {
            url: '/request.php?action=getDestination&search=%QUERY',
            cache:true
        },
        template: [
            '<p>{{Destination}}, {{Country}}</p>'
        ].join(''),
        engine: Hogan,
    }).on('typeahead:selected', onAutocompleted);

    $('#citySearhForm').on("submit",function(e){
       var thisForm = $(this);
       e.preventDefault();
       $.ajax({
           url:'/request.php',
           type:'get',
           cache:true,
           data:thisForm.serialize(),
           beforeSend:function() {
               showHideLoading('progressBar',true);
               $('#results').empty();
           },
           success:function(data){
               showHideLoading('progressBar',false);
               $('#results').append(data);
           }
       });
    });
});