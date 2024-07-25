<?php

function alert($message, $message_type)
{
  $_SESSION["alert"] = [
    "message_$message_type" => $message,
    "time_message" => time()
  ];

  return true;
}
