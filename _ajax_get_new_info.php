<?php
shell_exec('/usr/bin/python /usr/local/app/nyusatsu_check_cron/main.py');
header("Content-type: text/plain; charset=UTF-8");
echo "更新しました。ブラウザを再読み込みして下さい。";