<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CloudBin | My Cloud Drive</title>
    <meta name="description" content="Demo for the tutorial: Styling and Customizing File Inputs the Smart Way" />
    <meta name="keywords" content="cutom file input, styling, label, cross-browser, accessible, input type file" />
    <meta name="author" content="Osvaldas Valutis for Codrops" />
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" type="text/css" href="styles.css" />
    <link rel="stylesheet" type="text/css" href="css/normalize.css" />
    <link rel="stylesheet" type="text/css" href="css/demo.css" />
    <link rel="stylesheet" type="text/css" href="css/component.css" />
    <!--[if IE]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- remove this if you use Modernizr -->
    <script>(function(e,t,n){var r=e.querySelectorAll("html")[0];r.className=r.className.replace(/(^|\s)no-js(\s|$)/,"$1js$2")})(document,window,0);</script>

</head>
<body>


<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;

// Allow certain file formats
$notallowed = array('bat', 'exe', 'cmd', 'sh', 'php', 'pl', 'cgi', '386',
                    'dll', 'com', 'torrent', 'js', 'app', 'jar', 'pif',
                    'vb', 'vbscript', 'wsf', 'asp', 'cer', 'csr', 'jsp',
                    'drv', 'sys', 'ade', 'adp', 'bas', 'chm', 'cpl', 'crt',
                    'csh', 'fxp', 'hlp', 'hta', 'inf', 'ins', 'isp', 'jse',
                    'htaccess', 'htpasswd', 'ksh', 'lnk', 'mdb', 'mde', 'mdt',
                    'mdw', 'msc', 'msi', 'msp', 'mst', 'ops', 'pcd', 'prg',
                    'reg', 'scr', 'sct', 'shb', 'shs', 'url', 'vbe', 'vbs',
                    'wsc', 'wsf', 'wsh');

$ext = pathinfo($target_file, PATHINFO_EXTENSION);
if(in_array($ext,$notallowed) ) {
    ?>
    <div class="alert" style="text-align: center">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        <strong>Sorry! File format not allowed.</strong> Please zip it, then try again.
    </div>
    <?php
    $uploadOk = 0;
    //echo "Sorry, file format not allowed. Please zip it then try again";
}

// Check if file already exists
if (file_exists($target_file)) {
    ?>
    <div class="alert" style="text-align: center">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        <strong>Sorry! File already exists.</strong>
    </div>
    <?php
    //echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 8000000000) {
    ?>
    <div class="alert" style="text-align: center">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        <strong>Sorry! File is too large.</strong>Maximum size 1GB allowed.
    </div>
    <?php
    //echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    //echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        ?>
        <div class="alert success" style="text-align: center">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            <strong>Hey! [<?php echo "". basename( $_FILES["fileToUpload"]["name"]). ""; ?>] uploaded successfully.</strong>
        </div>
        <?php
    } else {
?>
        <div class="alert" style="text-align: center">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            <strong>Sorry! There was an error uploading your file.</strong>
        </div>
<?php
        //echo "Sorry, ";
    }
}
?>

<div class="container">
    <header class="codrops-header">
        <h1><a href="http://www.cloudbin.cf/"style="color: #330208;">CloudBin</a></h1>
        <p>Cloud storage | <strong style="color:#f44336;">Save files to CloudBin | No login Required!</strong></p>
        <a href="uploads/" class="button button1">Browse Files</a>
    </header>
    <div class="content">
        <div class="box">
            <form action="upload.php" method="post" enctype="multipart/form-data">

                <input type="file" name="fileToUpload" id="fileToUpload" class="inputfile inputfile-6" data-multiple-caption="{count} files selected" multiple />
                <label for="fileToUpload"><span></span> <strong><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> Choose a file&hellip;</strong></label>

                <input style="color: #330208;

					width: 54.7%;
					font-size: 1.6rem;
					/* 20px */
					font-weight: 700;
					text-overflow: ellipsis;
					white-space: nowrap;
					cursor: pointer;
					display: inline-block;
					overflow: hidden;
					border: 1px solid #330208;
					padding-top: 0.3rem;
    				padding-right: 1rem;
    				padding-bottom: 0.8rem;
    				padding-left: 1rem;" type="submit" value="Upload" name="submit">
            </form>
        </div>

        <footer>©2018 <a href="https://www.facebook.com/towsif07" target="_blank">Towsif Ahmed Omi</a> | All rights reserved.</footer>

    </div>

</div><!-- /container -->

<script src="js/custom-file-input.js"></script>

<!-- // If you'd like to use jQuery, check out js/jquery.custom-file-input.js
<script src="js/jquery-v1.min.js"></script>
<script src="js/jquery.custom-file-input.js"></script>
-->

</body>
</html>
