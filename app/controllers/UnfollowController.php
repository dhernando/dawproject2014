<?php

class UnfollowController extends BaseController {

  public function stopfollow()
  {
        $userid = Auth::user()->getUser()->id;
        $idgrupo = $_POST['idgrupo'];
        
        Favorito::unfollow($userid, $idgrupo);
  }

}
