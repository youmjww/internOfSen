--
-- app/action/Addphoto/Do.php
--
-- 写真追加
INSERT INTO photos(id,filePath,userid,timestamp, goulp) values (nextval('photoId'),'./userPhoto/$newFileName','$userId', '$nowTime', '$group' );

--
-- app/action/Adduser/Do.php
--
-- ユーザ追加
INSERT INTO users(id,name,password,mailaddres) values (nextval('userId'),'$username','$password','$mailaddres');

-- 新規登録しようとしているユーザがすでに登録済みか
select name from users where mailaddres='$mailaddres';

--
-- app/action/Login/Do.php
--
-- ユーザのログイン用
select id from users where mailaddres='$escapeMailaddress' and password='$escapePassword'

-- セッションにデータを渡す用
select name from users where mailaddres='$escapeMailaddress'


--
-- app/action/ViewAllPhoto.php
--
-- メモを保存
update photos set memo = '$escapeMemo' where filepath = '$filepath';

-- グループ名を保存
update photos set goulp = '$escapGroupName' where filepath = '$filepath';

-- 自分の写真をすべて調べて、順番が変わらないようにソートしています
select filepath, memo, goulp from photos where userid = '$userId'  order by timestamp;

-- プルダウン用のグループ変数に持ってくる用
select goulp from photos where userid = '$userId'

