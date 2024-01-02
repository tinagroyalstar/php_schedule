<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>課表</title>
    <style>
        table {
            border-collapse: collapse;
            width: 80%;
            margin-left: auto;
            margin-right: auto;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
    <h2 style="text-align: center;">台北市XX區XX國民小學 111學年度第一學期</h2>
    <h2 style="text-align: center;">一年甲班  班級課表</h2>
</head>
<body>

<script>
    <?php
        $schedule = array(
            array("節次/星期", "星期一", "星期二", "星期三", "星期四", "星期五"),
            array("08:00~08:20", "晨讀", "班級讀書會", "晨讀", "班級讀書會", "地理"),
            array("08:20~08:40", "打掃", "打掃", "英文"),
            array("第一節 08:45~09:25", "生活課程-綜合", "國語", "國語", "數學", "國語"),
            array("第二節 09:30~10:10", "生活課程-綜合", "數學", "生活課程-音樂", "國語", "-"),
            array("10:10~10:30", "全校運動時間"),
            array("第三節 10:30~11:10", "國語", "健康與體育", "彈性(導師)", "生活課程-音樂", "健康"),
            array("第四節 09:30~10:10", "國際教育", "健康與體育", "數學", "國語", "-"),
            array("午餐時間 12:00~12:40"),
            array("午休時間 12:40~13:00"),
            array("第三節 10:30~11:10", "-", "生活課程", "-", "-", "-"),
            array("第四節 09:30~10:10", "-", "生活課程", "-", "-", "-"),
        );

        echo "document.write('<table>');";
        foreach ($schedule as $rowIndex => $row) {
            echo "document.write('<tr>');";
            foreach ($row as $colIndex => $cell) {
                if ($cell === "班級讀書會") {
                    echo "document.write('<td rowspan=\"2\">$cell</td>');";
                } elseif ($cell === "全校運動時間") {
                    echo "document.write('<td colspan=\"5\">$cell</td>');";
                } elseif ($colIndex === 0 && preg_match('/第(\S+)節/u', $cell, $matches)) {
                    $newCell = preg_replace('/(第\S+節)/u', '$1<br>', $cell);
                    echo "document.write('<td>$newCell</td>');";
                } elseif ($colIndex === 0 && preg_match('/(時間)/u', $cell)) {
                    $newCell = preg_replace('/(時間)/u', '$1<br>', $cell);
                    echo "document.write('<td colspan=\"6\">$newCell</td>');";
                } else {
                    echo "document.write('<td>$cell</td>');";
                }
            }
            echo "document.write('</tr>');";
        }
        echo "document.write('</table>');";
    ?>

</script>

</body>
</html>
