<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $year = $_POST['year'];
    $month = $_POST['month'];
    if (!is_numeric($year) || !is_numeric($month) || $month < 1 || $month > 12) {
        echo "유효한 년도와 월을 입력해 주세요.";
    } else {
        $firstDayOfMonth = date('w', strtotime("$year-$month-01"));
        $lastDayOfMonth = date('t', strtotime("$year-$month-01"));
    }
}
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>달력</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            width: 14%;
            height: 40px;
            text-align: center;
            border: 1px solid purple;
        }
        th {
            background-color: pink;
        }
        td {
            background-color: white;
        }
        .title {
            background-color: skyblue;
            text-align: center;
            font-size: 20px;
            padding: 10px 0;
        }
        .empty {
            background-color: white;
        }
    </style>
</head>
<body>
    <h1>달력 생성기</h1>
    <form method="POST">
        <label for="year">년도:</label>
        <input type="text" id="year" name="year" value="2001" required>
        <label for="month">월:</label>
        <input type="text" id="month" name="month" value="2" required>
        <button type="submit">달력 출력</button>
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && $year && $month): ?>
        <table>
            <tr>
                <td colspan="7" class="title"><?php echo "$year 년 $month 월 달력"; ?></td>
            </tr>
            <tr>
                <th>일</th>
                <th>월</th>
                <th>화</th>
                <th>수</th>
                <th>목</th>
                <th>금</th>
                <th>토</th>
            </tr>
            <tr>
                <?php
                    $currentDay = 1;
                    for ($i = 0; $i < $firstDayOfMonth; $i++) {
                        echo "<td class='empty'></td>";
                    }
                    for ($i = $firstDayOfMonth; $i < 7; $i++) {
                        if ($currentDay <= $lastDayOfMonth) {
                            echo "<td>$currentDay</td>";
                            $currentDay++;
                        }
                    }
                    echo "</tr>";
                    while ($currentDay <= $lastDayOfMonth) {
                        echo "<tr>";
                        for ($i = 0; $i < 7; $i++) {
                            if ($currentDay <= $lastDayOfMonth) {
                                echo "<td>$currentDay</td>";
                                $currentDay++;
                            } else {
                                echo "<td class='empty'></td>";
                            }
                        }
                        echo "</tr>";
                    }
                ?>
        </table>
    <?php endif; ?>
</body>
</html>
