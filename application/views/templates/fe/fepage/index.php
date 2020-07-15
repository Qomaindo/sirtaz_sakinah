<?php

$this->load->view('templates/fe/fepage/header');

// $this->load->view('tmp/backend_topbar');

$this->load->view('templates/fe/fepage/menubar');

?>

<div class="content-wrapper">

<?php

if (isset($content)) echo $content;

?>

</div>

<?php

$this->load->view('templates/fe/fepage/footer');

?>
