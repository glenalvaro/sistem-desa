
 <?php

$querySetting = "SELECT cek_internet FROM `setting`";
$set = $this->db->query($querySetting)->row_array();


//cek koneksi google.com
$connected = @fsockopen("www.google.com", 80); 
    if($set['cek_internet']=='Ya'){
        if ($connected) {
            fclose($connected);
        } else {
            $script = file_get_contents('./assets/js/notif-internet.js');
            echo "<script>".$script."</script>";
        }
    } 
?> 

