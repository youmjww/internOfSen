{foreach from=$app.allPhoto item=photo}
    <div>
        <img src="{$photo.filepath}" style="width:50%" data-action="zoom">
    </div>
{/foreach}

