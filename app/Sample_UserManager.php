<?php
class Sample_userManager
{
  public function auth($mailaddress, $password)
  {
    // dummyロジック
    // 認証を行っているふりだけをしている

    // 認証失敗時
    if($mailaddress != $password) {
      return Ethna::raiseNotice('メールアドレスまたはパスワードが正しくありません。', E_SAMPLE_AUTH);
    }

    return null;
  }
}
