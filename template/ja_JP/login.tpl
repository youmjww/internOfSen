<form action="." method="post">
{if count($errors)}
  <ul>
  {foreach from=$errors item=error}
    <li>{$error}</li>
  {/foreach}
  </ul>
{/if}
  <table border="0">
    <tr>
      <td>メールアドレス</td>
      {* $form.* でくくることによってサニタイズされてXSSなどの心配をしなくて良くなる *}
      <td><input type="text" name="mailaddress" value="{$form.mailaddress}"></td>
    </tr>
    <tr>
      <td>パスワード</td>
      {* message name=""と書くと特定のフォームに対するメッセージを書くことが出来る *}
      <td><input type="password" name="password" value=""></td>
    </tr>
  </table>
  <p>
  <input type="submit" name="action_login_do" value="ログイン">
  </p>
</form>
