#!/bin/bash
if pgrep ffmpeg
then 
  echo "ffmpeg already running. Restarting."
  killall ffmpeg
  sleep 5 
fi

ffmpeg -hide_banner -nostdin -i http://user:password@host/cam_pic_new.php -re -ar 44100 -ac 2 -acodec pcm_s16le -f s16le -ac 2 -i /dev/zero -f h264 -vcodec h264 -acodec aac -ab 128k -g 50 -strict experimental -f flv rtmp://a.rtmp.youtube.com/live2/key
