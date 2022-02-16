<?php
use application\core\Controller;

class NotFoundController extends Controller
{
    public function pageNotFound()
    {
        $this->view('error/404');
    }
}
?>