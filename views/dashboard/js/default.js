
// test function

$(function()
{
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
            alert('inserting in db');
        });
        
        // this return false makes the form being handled by this js and 
        // simultaneously not refreshing the page
        return false;
    });
});
