{literal}
<script type="text/javascript">
    function getCheck(){
        var checked = document.getElementsByName("addGroupCheck");
        console.log(checked[0].checked);
        var pullList = document.getElementsByName("pullList").disabled;
        if( checked[0].checked == true ) {
            pullList = "disabled";
        } else
        {
            pullList = "";
        }
        console.log(btn);
    }
</script>
{/literal}
<h2>写真のアップロード</h2>

<p>{$app.message}</p>
<form action="." method="post" enctype="multipart/form-data">
    {if count($errors)}
        <ul>
            {foreach from=$errors item=error}
                <li>{$error}</li>
            {/foreach}
        </ul>
    {/if}


  <table border="0">
    <tr>
     <td>写真</td>
     <td>
        <input type="file" name="photo">
     </td>
    <td>
    </td> 
   </table> 

   グループ
     <select name="pullList">
        <option>hoge</option>
    </select><br>

    グループの追加 
    <INPUT type="checkbox" name="addGroupCheck" onclick="getCheck()"></input>
    <input type="text" name="newGroupName" value="未分類"></input><br>
    <p> 
    <input type="submit" name="action_addphoto_do" value="写真をアップロードする"> 
</p>
</form>
