<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Komentar</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>

<body>
    <br>
    <div class="w3-container w3-center">
        <h1>List Content</h1>
        <hr>
        <div class="w3-row-padding">
            <?php foreach ($content->result() as $row) : ?>
                <div class="w3-col s4">
                    <div class="w3-blue w3-padding-large">
                        <h3>
                            <a href="<?php echo site_url('komentar/detail/') . $row->content_id ?>"><?php echo $row->content_title; ?></a>
                        </h3>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>

</html>