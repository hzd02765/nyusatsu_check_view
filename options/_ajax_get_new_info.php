<?php
// exec('/usr/bin/python /usr/local/app/nyusatsu_check_cron/main.py 2>&1', $buf);
// exec('/usr/bin/python /usr/local/app_release/nyusatsu_check_cron/main.py 2>&1', $buf);
exec('/usr/bin/python /usr/local/my_product/nyusatsu_check_cron/ekimu/main.py 2>&1', $buf);
exec('/usr/bin/python /usr/local/my_product/nyusatsu_check_cron/ekimu2/main.py 2>&1', $buf);

header("Content-type: text/plain; charset=UTF-8");

// デバッグ用
// print_r($buf);

echo "更新しました。ブラウザを再読み込みして下さい。";
