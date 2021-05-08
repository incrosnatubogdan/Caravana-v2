<?php 

if(isset($_POST["submit"])) {
    $extra = array(  
        'parentClass' => 'col-xs-12 col-sm-6 col-md-4 blogBox moreBox',
        "title" => "Caravana nr." . $_POST['caravana'],
        "image" => "assets/img/caravane/" . $_POST['caravana'] . "/gallery-thumb.jpg",
        "link" => "caravane/" . $_POST['caravana'] . ".html",
        "tag" => "Caravane",
        "date"  => $_POST["date"], 
        'location' => $_POST["location"], 
        'testimonial' => $_POST["testimonial"], 
        'icon' => "assets/img/icon/caravane.svg"
    );
    $final_data = json_encode($extra);
    file_put_contents("test.json", $final_data);
}

?>

<head>
    <title>Fisa de urmarire a pacientului CCM</title>
    <html lang="ro">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=0">
    <meta name="HandheldFriendly" content="true">
    <link rel="manifest" href="manifest.webmanifest">
</head>

<body>
    <iframe name="votar" style="display:none;"></iframe>
    <form id="medical_form" method="post" target="votar">
        <div class="col_half">
            <label>Numar Carvana</label>
            <input type="text" name="caravana" class="form_control important protected_data" />
        </div>
        <div class="col_half">
            <label>Data</label>
            <input type="text" name="date" class="form_control important protected_data" />
        </div>
        <div class="col_half">
            <label>Location</label>
            <input type="text" name="location" class="form_control important protected_data" />
        </div>
        <div class="col_half">
            <label>Testimonial</label>
            <input type="text" name="testimonial" class="form_control important protected_data" />
        </div>
        <input type="submit" name="submit" class="btn btn-info submit-button" />
    </form>
</body>