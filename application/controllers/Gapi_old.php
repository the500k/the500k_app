<?php
session_start();
require_once 'vendor/autoload.php';
class Gapi extends CI_Controller {
 
function __construct()
{
   parent::__construct();
  


	$this->load->library('session');
	$this->load->helper('url');
$this->load->helper('form');
 
  $this->load->library('email');

  $this->load->model('Crud_model');
  $this->load->model('Admin_model');




  
}
 
function read_data()
{
  	echo "Hi jeeva";
  	
$client = new \Google_Client();
$client->setApplicationName('jeeva');
$client->setScopes([\Google_Service_Sheets::SPREADSHEETS]);
$client->setAccessType('offline');
$client->setAuthConfig(__DIR__ . '/testapi-277617-9864140e6b89.json');
$service = new Google_Service_Sheets($client);
$spreadsheetId = "1953iJflj02kKCUr6l-DJQ_Hl-a334afBjhmVdAVo16A";

$range = 'sheet1!A:F';
$response = $service->spreadsheets_values->get($spreadsheetId, $range);
$values = $response->getValues();
if (empty($values)) {
   print 'No data found.<br>  ';
} else {
   foreach ($values as $row) {
      for ($i = 0; $i < sizeof($row); $i++) {
          echo $row[$i].'<br>';
      }
   }
}
 }

 function write_data()
{
  echo "Hi jesus";
 }

}

?>