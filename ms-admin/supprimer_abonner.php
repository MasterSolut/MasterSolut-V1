<?php
    include('config.php');
	if(isset($_GET['supp_abonner'])){
             $classsection->update_abonner($_GET['supp_abonner']);
              echo '<script type="text/javascript">
                         opener.location.reload();
                        self.close()
                    </script>';   
    }
?>