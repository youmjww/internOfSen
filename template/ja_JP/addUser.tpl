<h2>ユーザーの新規追加</h2>

<form action="." method="post">
  <table border="0">
    <tr>
      <td>user name</td>
      <td><input type="text" name="username" value=""></td>

    </tr>
    <tr>
     <td>password</td>
         <td><input type="password" name="password" value=""></td>
    </tr>
    <tr>
        <td>mailaddress</td>
        <td><input type="mailaddres" name="mailaddres" value="{$from.mailaddress}"></td>
    </tr>
  </table>
  <p>
  <input type="submit" name="action_adduser_do" value="登録">
  </p>
</form>
