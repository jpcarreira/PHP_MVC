
// test function

$(function()
{
    // get call to display all data from db
    
    $.get('dashboard/xhrGetListings', function(o)
    {
        console.log(o);
        
        // loop to go trough everything
        for(var i = 0; i < o.length; i++)
        {
            $('#listInserts').append('<div>' + o[i].text + '</div>');
        }
        
    }, 'json');
    
    
    $('#randomInsert').submit(function()
    {
        // serializing the form
        var data = $(this).serialize();
        
        // geting the action's url
        var url = $(this).attr('action');
        
        // debug 
        //console.log(data);
        //alert(data);
        
        // posting based on url and data, with the respective call back function
        $.post(url, data, function(o)
        {
            console.log(o);
            $('#listInserts').append('<div>' + o + '</div>');
            alert('inserting in db');
        });
        
        // this return false makes the form being handled by this js and 
        // simultaneously not refreshing the page
        return false;
    });
});
