<?php

class Sample_SampleManager
{
    function test($data)
    {
        // 実際には，まともなエラー処理を行う．
        if (! $data) {
            // 通知を出す
            return Ethna::raiseNotice('データがありません', E_SAMPLE_TEST);
        }
        return 0;
    }
}
