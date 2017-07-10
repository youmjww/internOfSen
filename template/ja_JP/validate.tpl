<form action="." method="post">
  {$form.error}<br>
  <table border="0">
    <tr>
      <tb>{ message name="mailaddress" }</tb><br>
      <td>メールアドレス</td>
      <td><input type="text" name="mailaddress" value="{$form.mailaddress}"></td>
    </tr>
    <tr>
      <tb>{ message name="password" }</tb>
      <td>パスワード</td>
      <td><input type="password" name="password" value=""></td>
    </tr>
  </table>
  <p>
  <input type="submit" name="action_validate" value="ログイン">
  </p>
</form>
