<form action="." method="post" name="groupSelect">
    <select name="group">
        {foreach from=$app.groupList item=list}
            {if $list eq $app.nowSelect}
                <option value="{$list}" selected>{$list}</option>
            {else}
                <option value="{$list}">{$list}</option>
            {/if}
        {/foreach}
    </select>
        <input type="submit" name="action_viewAllPhoto" value="グループを選択"></input>
</form>
<br>


{foreach from=$app.allPhoto item=photo}
        <form action="." method="post">

            <img src="{$photo.filepath}" style="width:50%" data-action="zoom"><br>
            <p>メモ: {$photo.memo}</p>
            <textarea type="text" name="memo" maxlength="80"  placeholder="メモ"></textarea>
            <input type="hidden" name="name" value="{$photo.filepath}"></input>
            <input type="submit" name="action_ViewAllPhoto" value="送信"></input>
            <input type="hidden" name="group" value="{$app.nowSelect}"></input>

        </form>
        <form action="." method="post">
            <input type="text" name="newGroupName" maxlength="20"  placeholder="グループ"></input>
            <p>グループ: {$photo.goulp}</p>
            <input type="hidden" name="name" value="{$photo.filepath}"></input>
            <input type="submit" name="action_ViewAllPhoto" value="送信"></input>
        </form>
        <br><br>
{/foreach}

