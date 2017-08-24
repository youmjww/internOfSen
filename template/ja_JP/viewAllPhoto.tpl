<form action="." method="post" name="groupSelect">
    グループ・フィルター:
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

{literal}
<script type="text/javascript">
    function memoAlert()
    {
        var memo = document.getElementsByName("memo");

        var result = confirm("メモを上書きしますがよろしいですか？");
        if (!result)
        {
            memo[0].name = ""
        }
    }

    function groupAlert()
    {
        var newGroupName = document.getElementsByName("newGroupName");
        var name = document.getElementsByName("group");

        var result = confirm("グループを上書きしますがよろしいですか？");
        if (!result)
        {
            newGroupName[0].value = name[0].value;
        }
    }
</script>
{/literal}

{foreach from=$app.allPhoto item=photo}
    <div>
        <form action="." method="post">

            <img src="{$photo.filepath}" style="width:50%" data-action="zoom"><br>
            <p>メモ: {$photo.memo}</p>
            <textarea type="text" name="memo" maxlength="80"  placeholder="メモ"></textarea>
            <input type="hidden" name="name" value="{$photo.filepath}"></input>
            <input type="submit" name="action_ViewAllPhoto" value="送信" onclick="memoAlert()"></input>
            <input type="hidden" name="group" value="{$app.nowSelect}"></input>

        </form>
        <form action="." method="post">
            <input type="text" name="newGroupName" maxlength="20"  placeholder="グループ"></input>
            <input type="submit" name="action_ViewAllPhoto" value="送信" onclick="groupAlert()"></input>
            <p>グループ: {$photo.goulp}</p>
            <input type="hidden" name="name" value="{$photo.filepath}"></input>
        </form>
        <br><br>
    </div>
{/foreach}

