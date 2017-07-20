<?php
class Sample_UserManager
{
    public function auth($id)
    {
        if (!$id) {
            return Ethna::raiseNotice('メールアドレスまたはパスワードが正しくありません', E_AUTH);
        }

        return null;
    }
}
