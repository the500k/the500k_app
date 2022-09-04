
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function index() {

		echo "hi";
	//	$this->load->library('codeigniter-library-google-spreadsheet/Google_Spreadsheet');
	/*	$this->google_spreadsheet->init(
			'user_access_token',
			'user_refresh_token',
			'client_id',
			'client_secret_key'
		);

	/*	if (true === $this->google_spreadsheet->find_spreadsheet('MySpreadsheetsName')) {
			echo "pass find_spreadsheet \n";
			if (true === $this->google_spreadsheet->find_worksheet('MyWorksheet', true)) {	// true: create if not exists
				echo "pass find_worksheet \n";
				if (true === $this->google_spreadsheet->update_cell(1, 1, date('Y-m-d H:i:s'))) {
					echo "pass update_cell \n";
				}

				if (true === $this->google_spreadsheet->update_cells(array(
					array( 1, 1, date('Y-m-d H:i:s') ),
					array( 1, 2, 'Hello' ),
					array( 1, 3, 'World' ),
					
				))) {
					echo "pass update_cells \n";
				}
			}
		}
	}*/

	public function oath() {
		
		/*$this->load->helper('url');
		$this->load->library('codeigniter-library-google-spreadsheet/Google_Spreadsheet');
		$ret = $this->google_spreadsheet->oauth_request_handler(
			'client_id',
			'client_secret_key'
			// scope
			array(
				'https://www.googleapis.com/auth/spreadsheets', 
				'https://spreadsheets.google.com/feeds',
			),
			// enable offline
			true,
			preg_replace("{//[^/]+/}", "//".$this->input->server('HTTP_HOST')."/", current_url())
		);

		if ($ret['action'] == 'redirect') {
			redirect($ret['data'], 'location', 301);
			return;
		}

		print_r($ret);*/
		// Array ( [action] => done [data] => Array ( [access_token] => UsersAceessToken [token_type] => Bearer [expires_in] => 3600 [created] => 1466331600 ) )
	}
}
?>