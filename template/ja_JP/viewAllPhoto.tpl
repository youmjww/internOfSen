{foreach from=$app.allPhoto item=photo}
        <form action="." method="post">

            <img src="{$photo.filepath}" style="width:50%" data-action="zoom"><br>
            <p>{$photo.memo}</p>
            <textarea type="text" name="memo" maxlength="80"  placeholder="メモ"></textarea>
            <input type="hidden" name="name" value="{$photo.filepath}"></input>
            <input type="submit" name="action_ViewAllPhoto" value="送信"></input>
        </form>
        <br><br>
{/foreach}

