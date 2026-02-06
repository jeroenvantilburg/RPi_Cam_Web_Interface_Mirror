<?php
if (isset($_POST['day'])) {
    $command = escapeshellcmd('python3 /var/www/macros/set_IRCUT_day.py');
    shell_exec($command . ' > /dev/null 2>&1 &');
}
if (isset($_POST['night'])) {
    $command = escapeshellcmd('python3 /var/www/macros/set_IRCUT_night.py');
    shell_exec($command . ' > /dev/null 2>&1 &');
}
if (isset($_POST['auto'])) {
    $command = escapeshellcmd('python3 /var/www/macros/set_IRCUT_auto.py');
    shell_exec($command . ' > /dev/null 2>&1 &');
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Live stream control</title>
    <style>

.video-container {
    //width: 100%;
    //max-width: 560px;
    margin: auto;
    position: relative;
    overflow: hidden;
    padding-bottom: 56.25%;
    //padding-top: 25px;
    height: 0;
}
.video-container iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border: 0;
}
.video-wrap {
  width: 100%;
  max-width: 560px;
}
        .button {
            border: none;
            color: white;
            padding: 12px 24px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }

        .button:hover {
            box-shadow: 0 6px 12px rgba(0,0,0,0.15);
            transform: translateY(-2px);
        }

        .green { background-color: #4CAF50; }
        .green:hover:not(:disabled) { background-color: #45a049; }
        .green:disabled { background-color: #81c784; }
        .red { background-color: #f44336; }
        .red:hover:not(:disabled) { background-color: #d32f2f; }
        .red:disabled { background-color: #e57373 }
        .grey { background-color: #9E9E9E;}
        .grey:hover:not(:disabled) { background-color: #757575; }
        .grey:disabled { background-color: #bdbdbd; }
    </style>
</head>
</head>
<body>
    <h1>Control Panel</h1>
    <form method="post">
        <button class="button grey" type="submit" name="day">Day</button>
        <button class="button grey" type="submit" name="night">Night</button>
        <button class="button grey" type="submit" name="auto">Auto</button>
    </form>
</body>
</html>

