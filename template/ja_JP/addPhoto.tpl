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

   グループ <input type="text" name="group" value="未分類"></input>
<p> 
    <input type="submit" name="action_addphoto_do" value="写真をアップロードする"> 
</p>
</form>
