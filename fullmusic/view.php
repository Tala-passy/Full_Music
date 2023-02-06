<?php
foreach($genres as $gen){
    $statement = $db->prepare('select * from albums where genre=?');
    $statement->execute(array($gen['id']));
foreach($statement as $albums){
  echo'  <div class="modals">
    <div class="modal fade" id="'.$albums['id'].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">'.$albums['name'].'</h4>
                </div>
                <div class="modal-body">
                    <div class="thumbnail">
                        <img class="image" src="images/'.$albums['image'].'" alt="">
                        <div class="prize">'.number_format($albums['price'],2,'.','').'£</div>
                        <div class="caption">
                            <h4><span class="titre">'.$albums['name'].'</span> (<span class="annee">'.$albums['year'].'</span>)</h4>
                            <p><i>Artiste: </i><b class="artist">'.$albums['artist'].'</b></p>
                            <p class="description"></p>
                            <p><a class="btn btn-order" role="button" href="#">Acheter</a></p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>
  </div>';
}
  
}
?>
