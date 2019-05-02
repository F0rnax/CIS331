<?php 
require('../model/config.php');
require('../model/variables.php');
include $header; ?>
<div id = "master">
    <div id="main-container">
        <div id="content">
            <h2 class="top">Error</h2>
            <p><?php echo $error; ?></p>
            
            <p><a href="index.php">Back</a></p>
        </div>
    </div>
</div>
