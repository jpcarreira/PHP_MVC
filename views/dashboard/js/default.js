$(function()
{
    $.get('dashboard/xhrGetListings', function(o)
    {
        for(var i = 0; i < o.length; i++)
        {
            $('#listInserts').append('<div>' + o[i].text + '<a class="del" rel="' + o[i].dataid + '" href="#">X</a></div>');
        }
       
        $('.del').click(function()
        {
            delItem = $(this);
            var dataid = $(this).attr('rel');
            
            $.post('dashboard/xhrDeleteListing', {'dataid': dataid}, function(o)
            {
                delItem.parent().remove();
            }, 'json');
            
            location.reload();
            
            return false; 
        });
        
    }, 'json');
    
    
    $('#randomInsert').submit(function()
    {
        var url = $(this).attr('action');
        var data = $(this).serialize();
        
        $.post(url, data, function(o)
        {
            $('#listInserts').append('<div>' + o.text + '<a class="del" rel="' + o.dataid + '" href="#">X</a></div>');
        }, 'json');
        
        location.reload();
        
        return false; 
    });
});