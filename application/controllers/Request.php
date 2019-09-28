<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Request extends CI_Controller {

  public function index() {

    function php_redirect($REDIRECT_URL, $POST_DATA, $METHOD = 'post') {
      print("$('body').html('');");
      print("<form id='redirect_data_form' action='{$REDIRECT_URL}' method='{$METHOD}'>");
      foreach ($POST_DATA as $a => $b) {
              print('<input type="hidden" name="'.htmlentities($a).'" value="'.htmlentities($b).'">');
          }
      print("</form>");
      print("<script type='text/javascript'>
          $('form#redirect_data_form').submit();
      </script>");
    }

    $data = $this->input->post('data');
    $data = json_decode($data, True);
    $url = $this->input->post('url');
    $num = $this->input->post('total');

    /*$ch = curl_init();

    curl_setopt($ch, CURLOPT_URL,"https://docs.google.com/forms/".$url."/formResponse");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);*/

    //for($i=0; $i<$num; $i=$i+1) {
      php_redirect("https://docs.google.com/forms/".$url."/formResponse", $data);
      //curl_exec($ch);
    //}
    //curl_close ($ch);
  }
}
?>
