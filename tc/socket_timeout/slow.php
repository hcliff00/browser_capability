<?
    header("Content-Type: image/gif");

    $filename = "./ubuntu-logo.png";
    $len = filesize($filename);

    header("Content-Length: " . $len);

    $handle = fopen($filename, "r");
    while (!feof($handle)) {
        $data = fread($handle, 4096);
        usleep(1000*1000*1000);
        echo $data;
    }
    fclose($handle);
?>
