<?php
// File to store the flag
$flagFile = 'live_stream_on';

// Handle start command
if (isset($_POST['start'])) {
    $command = 'macros/start_live_stream.sh'; // Replace with your start command
    shell_exec($command . ' > /dev/null 2>&1 &');
    file_put_contents($flagFile, '1');
    //echo "<p>Program started and flag set.</p>";
}

// Handle stop command
if (isset($_POST['stop'])) {
    $command = 'macros/stop_live_stream.sh'; // Replace with your stop command
    shell_exec($command . ' > /dev/null 2>&1 &');
    if (file_exists($flagFile)) {
        unlink($flagFile);
    }
    //echo "<p>Program stopped and flag removed.</p>";
}

// Check if program is running
$isRunning = file_exists($flagFile);
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
        <button class="button green" type="submit" name="start" <?php if ($isRunning) echo 'disabled'; ?>>Start live streaming</button>
        <button class="button red" type="submit" name="stop" <?php if (!$isRunning) echo 'disabled'; ?>>Stop live streaming</button>
    </form>
    <p>Live streaming is currently <?php echo $isRunning ? 'running' : 'not running'; ?>.</p>
    <a href="index.php" class="button grey">Back to the web cam control</a>
    <p>
<div class="video-wrap">
<div class="video-container">
<iframe width="560" height="315" frameborder="0" src="https://www.youtube.com/embed/LU-HkRLido4?si=NU6SeBdvVoUhYOj3" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
</div>
</div>
    <a href="https://www.youtube.com/watch?v=LU-HkRLido4" class="button grey">Watch on Youtube</a>


</body>
</html>

