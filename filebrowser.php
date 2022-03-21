<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
    <title>Online file storage</title>

    <style type="text/css" media="all"> 
        @import url("style/style.css");
    </style>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
</head>
<body>

    <?php 
    $uploadFolder = "Data/panampshah@gmail.com";
        if(isset($_FILES['file']))
        {       
            $target_path = $uploadFolder;
            $target_path = $target_path . time() . '_' . basename( $_FILES['file']['name']);
            
            if(move_uploaded_file($_FILES['file']['tmp_name'], $target_path)) 
            {
                $message = "The file ".  basename( $_FILES['file']['name']). 
                " has been uploaded";
            } 
            else
            {
                $message = "There was an error uploading the file, please try again!";
            }
        }
        /** LIST UPLOADED FILES **/
        $uploaded_files = "";
    
        //Open directory for reading
        $dh = opendir($uploadFolder);

        //LOOP through the files
        while (($file = readdir($dh)) !== false) 
        {
            if($file != '.' && $file != '..')
            {
                $filename = $uploadFolder . $file;
                $parts = explode("_", $file);
                $size = formatBytes(filesize($filename));
                $added = date("m/d/Y", $parts[0]);
                $origName = $parts[1];
                $filetype = getFileType(substr($file, strlen($file) - 3));
                $uploaded_files .= "<li class=\"$filetype\"><a href=\"$filename\">$origName</a> $size - $added</li>\n";
            }
        }
        closedir($dh);
        if(strlen($uploaded_files) == 0)
        {
            $uploaded_files = "<li><em>No files found</em></li>";
        }

        function getFileType($extension)
        {
            $images = array('jpg', 'gif', 'png', 'bmp');
            $docs   = array('txt', 'rtf', 'doc');
            $apps   = array('zip', 'rar', 'exe');
            
            if(in_array($extension, $images)) return "Images";
            if(in_array($extension, $docs)) return "Documents";
            if(in_array($extension, $apps)) return "Applications";
            return "";
        }

        function formatBytes($bytes, $precision = 2) { 
            $units = array('B', 'KB', 'MB', 'GB', 'TB'); 
            
            $bytes = max($bytes, 0); 
            $pow = floor(($bytes ? log($bytes) : 0) / log(1024)); 
            $pow = min($pow, count($units) - 1); 
            
            $bytes /= pow(1024, $pow); 
            
            return round($bytes, $precision) . ' ' . $units[$pow]; 
        } 
    ?>
 
    <div id="container">
        <h1>Online File Storage</h1>
        
        <fieldset>
            <legend>Add a new file to the storage</legend>
            <form method="post" action="index.php" enctype="multipart/form-data">
                <input type="hidden" name="MAX_FILE_SIZE" value="100000" />
                <p><label for="name">Select file</label><br />
                <input type="file" name="file" /></p>
                <!-- <p><label for="password">Password for upload</label><br />
                <input type="password" name="password" /></p> -->
                <p><input type="submit" name="submit" value="Start upload" /></p>
            </form>   
        </fieldset>

        <fieldset>
            <legend>Previousely uploaded files</legend>
            <ul id="menu">
                <li><a href="">All files</a></li>
                <li><a href="">Documents</a></li>
                <li><a href="">Images</a></li>
                <li><a href="">Applications</a></li>
            </ul>
            
            <ul id="files">
            <?php echo $uploaded_files; ?>
            </ul>
        </fieldset>
    </div>

    <script src="js/filestorage.js" />
</body>
</html>