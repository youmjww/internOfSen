<h2>ユーザーの新規追加</h2>

<form action="." method="post">
    {if count($errors)}
        <ul>
            {foreach from=$errors item=error}
                <li>{$error}</li>
            {/foreach}
        </ul>
    {/if}


  <table border="0">
    {$form.setResult}
    <tr>
      <td>ユーザー名</td>
      <td><input type="text" name="username" value=""></td>
    </tr>
    <tr>
        <td>メールアドレス</td>
        <td><input type="text" name="mailaddress" value=""></td>
    </tr>
    <tr>
     <td>パスワード</td>
         <td><input type="password" name="password" value=""></td>
    </tr>
   </table>
  <p>
  <input type="submit" name="action_adduser_do" value="登録">
  </p>
</form>
