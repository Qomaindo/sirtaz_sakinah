<?php

$this->load->view('templates/be/header');

$this->load->view('templates/be/topbar');

if ($this->session->userdata('role_code') == 'MNJM') {
	$this->load->view('templates/be/sidebar/sidebarmanajemen', $nav_menu);
} else if ($this->session->userdata('role_code') == 'PGJR') {
	$this->load->view('templates/be/sidebar/sidebarpengajar', $nav_menu);
} else {
	$this->load->view('templates/be/sidebar/sidebarsysadmin', $nav_menu);
}
?>

<?php

if (isset($content)) echo $content;

?>

<?php

$this->load->view('templates/be/footer');


$this->load->view('templates/be/js');

?>
