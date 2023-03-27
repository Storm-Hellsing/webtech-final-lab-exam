<?php

  $date = DateTime::createFromFormat('m/d/Y','05/03/2023');
  $formatted_date = $date->format('Y-m-d');
  echo $formatted_date;

?>