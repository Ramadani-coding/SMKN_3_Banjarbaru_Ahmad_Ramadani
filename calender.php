<!DOCTYPE html>
<html>
<head>
    <title>Calendar</title>
    <style>
        /* Calendar styling */
        table {
            border-collapse: collapse;
        }
        th, td {
            padding: 5px;
            text-align: center;
        }
        .highlight {
            background-color: yellow;
        }
    </style>
</head>
<body>
    <?php
        // Get the current month and year
        $currentMonth = date('n');
        $currentYear = date('Y');

        // Check if the previous or next button was clicked
        if (isset($_GET['change'])) {
            if ($_GET['change'] == 'previous') {
                $currentMonth--;
                if ($currentMonth == 0) {
                    $currentMonth = 12;
                    $currentYear--;
                }
            } elseif ($_GET['change'] == 'next') {
                $currentMonth++;
                if ($currentMonth == 13) {
                    $currentMonth = 1;
                    $currentYear++;
                }
            }
        }

        // Get the number of days in the current month
        $numDays = cal_days_in_month(CAL_GREGORIAN, $currentMonth, $currentYear);

        // Get the first day of the month
        $firstDay = date('N', strtotime("$currentYear-$currentMonth-01"));

        // Create an array to store the days of the week
        $daysOfWeek = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];
    ?>
    <h1>Calendar</h1>
    <div>
        <a href="index.php?change=previous">&lt;</a>
        <span><?php echo date('F Y', strtotime("$currentYear-$currentMonth-01")); ?></span>
        <a href="index.php?change=next">&gt;</a>
    </div>
    <table>
        <tr>
            <?php foreach ($daysOfWeek as $day) : ?>
                <th><?php echo $day; ?></th>
            <?php endforeach; ?>
        </tr>
        <tr>
            <?php
                // Display empty cells for days before the first day of the month
                for ($i = 1; $i < $firstDay; $i++) {
                    echo '<td></td>';
                }

                // Display the days of the month
                $dayCount = 1;
                for ($i = $firstDay; $i <= 7; $i++) {
                    echo '<td' . (($dayCount == date('j') && $currentMonth == date('n') && $currentYear == date('Y')) ? ' class="highlight"' : '') . '>' . $dayCount . '</td>';
                    $dayCount++;
                }

                echo '</tr>';

                while ($dayCount <= $numDays) {
                    echo '<tr>';

                    for ($i = 1; $i <= 7 && $dayCount <= $numDays; $i++) {
                        echo '<td' . (($dayCount == date('j') && $currentMonth == date('n') && $currentYear == date('Y')) ? ' class="highlight"' : '') . '>' . $dayCount . '</td>';
                        $dayCount++;
                    }

                    echo '</tr>';
                }
            ?>
    </table>
</body>
</html>
