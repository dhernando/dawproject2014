<?php

class FollowController extends BaseController {

  public function startfollow()
  {
        $userid = Auth::user()->getUser()->id;
        $idgrupo = $_POST['idgrupo'];

        Favorito::follow($userid, $idgrupo);
  }

}
