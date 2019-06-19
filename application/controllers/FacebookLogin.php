<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require __DIR__ . '/vendor/autoload.php';  //---> cargo la clase fb con el autoload

class FacebookLogin extends CI_Controller {
    
    //---> Claves para emplear la GraphAPI de Facebook
    var $app_id ='1103539123165940';
    var $app_secret = 'ad666762fd43ae42b2f68fbc0b63876c';
   

    public function __construct() {

        parent::__construct();
       // $this->load->library('FacebookSDK');  /* supuestamente con esto se cargaba la libreria */
    }

    public function index() {

        $fb = new Facebook\Facebook([
            'app_id' => $this->app_id,
            'app_secret' => $this->app_secret,
            'default_graph_version' => 'v3.3'
        ]);

        $helper = $fb->getRedirectLoginHelper();
        try {
            $accessToken = $helper->getAccessToken();
            $fb->setDefaultAccessToken($accessToken);
            //---> pedimos a la GRAPH API la info del usuario
            $response = $fb->get('/me');
            $responsePicture = $fb->get('/me/picture?redirect=false&height=300');  //---> obtiene la imagen del usuario
            $userPicture = $responsePicture->getGraphUser();
            $userProfile = $response->getGraphUser();

            //---> Seteo la info del usuario en el userdata (la session)
            $this->session->userdata(
                array(
                    'nombre' => $userProfile['name'],
                    'auth_level' => 1,
                    'avatar' => $userPicture['url'],
                    'social' => true
                )
            );         

            //---> Aca tengo que redirigir la pagina a mi inicio
            redirect(base_url('C_Inicio'));

        } catch (Facebook\Exceptions\FacebookResponseException $e) {
            // When Graph returns an error
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch (Facebook\Exceptions\FacebookSDKException $e) {
            // When validation fails or other local issues
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }


        /*    Esete codigo es para publicar algo en el muro de la persona que inicio sesion
        try {
            $accessToken = 'token-que-no-vence';
            //$accessToken = $helper->getAccessToken();
            $linkData = [
                'link' => 'http://www.desarrollolibre.net/blog/tema/55/html/uso-basico-del-canvas',
                'message' => "otro test",
            ];
            var_dump($fb->post('/feed', $linkData, $accessToken));
        } catch (Facebook\Exceptions\FacebookResponseException $e) {
            // When Graph returns an error
            echo 'Graph returned an error: ' . $e->getMessage();
        } catch (Facebook\Exceptions\FacebookSDKException $e) {
            // When validation fails or other local issues
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
        } */
    }


}

?>