Dashboard... logged in only!

<br/>

<!-- the function responsible for this ajax call is xhrInsert in the dashboard controller -->
<form id="randomInsert" action="<?php echo URL; ?>dashboard/xhrInsert" method="post">
    
    <input type="text" name="text" />
    <input type="submit" />
    
</form>


<!-- div to list all data inserted into database -->
<div id="listInserts"></div>
    
    
