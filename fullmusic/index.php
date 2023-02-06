
<!DOCTYPE html>
<html>
<head>
    <title>ZoO albums</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body class="container">
    <?php
   require 'admin/database.php';
    echo'<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="#" class="navbar-brand">fUll MuZiC</a>
        </div>
        <ul class="nav navbar-nav navbar-right">';
        $db=Database::connect();
        $statement=$db->query('SELECT * from genres');
        $genres=$statement->fetchAll();
        foreach($genres as $gen){
            if($gen['id']=='1')
            echo'<li role="presentation" data-genres="5" class="active"> <a href="#'.$gen['id'].'" data-toggle="tab">'.$gen['name'].'</a></li>';
        else
        echo '<li role="presentation" data-genres="5" > <a href="#'.$gen['id'].'" data-toggle="tab">'.$gen['name'].'</a></li>';
        }
        echo'</ul>
        </div>
    </nav>';
    echo'<div class="tab-content">';
    foreach($genres as $gen){
        if($gen['id']=='1')
        echo'<div class="tab-pane active" id="'.$gen['id'].'">';
    else
    echo '<div class="tab-pane active" id="'.$gen['id'].'">';
    echo' <div class="row">';
    $statement=$db->prepare('SELECT * from albums where genre=?');
    $statement->execute(array($gen['id']));
    while($albums=$statement->fetch()){
echo'   <div class="col-xs-12 col-md-6">
<div class="thumbnail">
    <img src="images/'.$albums['image'].'" alt="A Decade of Hits 1969-1979">
    <div class="prize">'.number_format($albums['price'],2,'.','').' €</div>
    <div class="caption">
        <h4>'.$albums['name'].'</h4>
        <p><i>Artiste: </i>'.$albums['artist'].'</p>
        <a href="#'.$albums['id'].'" class="btn btn-order " data-toggle="modal">
            Voir le détail
        </a>
    </div>
</div>
</div>';
    }
    echo'</div>
    </div>';
    }
    echo'</div>';
    require_once 'view.php';
    Database::disconnect();
    
    ?>


        

   

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</body>
</html>
