{foreach from=$app.allPhoto item=photo}
    <div>
        <img src="{$photo.filepath}" style="width:100%">
    </div>
{/foreach}

