<h2>写真のアップロード</h2>

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
   </table> 
<p> 
    <input type="submit" name="action_addphoto_do" value="写真をアップロードする"> 
</p>
</form>
