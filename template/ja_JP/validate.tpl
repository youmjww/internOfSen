<form action="." method="post">
  {$form.error}<br>
  <table border="0">
    <tr>
    { message name="mailaddress" }
      <td>メールアドレス</td>
      <td><input type="text" name="mailaddress" value="{$form.mailaddress}"></td>
    </tr>
    <tr>
      <td>パスワード</td>
      <td><input type="password" name="password" value=""></td>
    </tr>
  </table>
  <p>
  <input type="submit" name="action_validate" value="ログイン">
  </p>
</form>
