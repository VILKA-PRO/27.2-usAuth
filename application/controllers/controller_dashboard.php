<?php
class Controller_dashboard extends Controller { 

    function action_index() { 
        if ($_SESSION['auth']) {
        $this->view->generate('dashboard/index.php', 'template_view.php'); 
        } else {
            header('Location: ?url=main');
        }
    } 
}
?>