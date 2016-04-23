<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('America/New_York');

class User extends CI_Controller {

	function __construct() {
	    parent::__construct();
	    $this->load->model('user_model', '', TRUE);
	}

	// Unused index action
	public function index()
	{
	}

	// Login
	public function login()
	{
        // Check if this is ip has failed login too many times
        $ip = $_SERVER['REMOTE_ADDR'];
        $timestamp = date('Y-m-d H:i:s', time() - 60 * 60 * 1);
        $ip_fails = $this->user_model->check_ip_request_since_timestamp($ip, 'login', $timestamp);
        $login_limit = 5;
        if (count($ip_fails) > $login_limit) {
            // echo 'Too many login attempts from this IP';
            // die();
        }

		// Validation
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[32]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|callback_login_validation');
        
        $world_key = $this->input->post('world_key');
		// Fail
        if ($this->form_validation->run() == FALSE) {
            // Record failed request
            $result = $this->user_model->record_ip_request($ip, 'login');   

            // Set fail message and redirect to map
        	$this->session->set_flashdata('failed_form', 'login');
        	$this->session->set_flashdata('validation_errors', validation_errors());
            redirect('world/' . $world_key, 'refresh');
		// Success
        } else {
            redirect('world/' . $world_key, 'refresh');
        }
	}

	// Validate Login Callback
	public function login_validation($password)
	{
		// Get other parameters
        $username = $this->input->post('username');
		// Compare to database
        $result = $this->user_model->login($username, $password);

        // Fail
        if (!$result || !password_verify($password, $result['password'])) {
            $this->form_validation->set_message('login_validation', 'Invalid username or password');
            return false;
		// Success
		} else {
			// Login
            $sess_array = array(
                'id' => $result['id'],
                'username' => $result['username']
            );
            $this->session->set_userdata('logged_in', $sess_array);
            return TRUE;
        }
	}

	// Register
	public function register()
	{
		// Validation
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|callback_register_validation|min_length[6]|matches[confirm]');
        $this->form_validation->set_rules('confirm', 'Confirm', 'trim|required');

        $world_key = $this->input->post('world_key');
        // Fail
        if ($this->form_validation->run() == FALSE) {
        	$this->session->set_flashdata('failed_form', 'register');
        	$this->session->set_flashdata('validation_errors', validation_errors());
            redirect('world/' . $world_key, 'refresh');
        // Success
        } else {
            $this->session->set_flashdata('just_registered', true);
            redirect('world/' . $world_key, 'refresh');
        }
	}

	// Validate Register Callback
    public function register_validation($password) {
        // Set parameters
        $email = "placeholder@gmail.com";
        $username = $this->input->post('username');
        // Email Validation
        $this->load->helper('email');
        if (!valid_email($email)) {
            $this->form_validation->set_message('register_validation', 'This is not a working email address');
            return false;
        } else {
            // Attempt new user register
            $facebook_id = 0;
            $ip = $_SERVER['REMOTE_ADDR'];
            $ip_frequency_register = 1;
            $user_id = $this->user_model->register($username, $password, $email, $facebook_id, $ip, $ip_frequency_register);
            // Fail
            if ($user_id === 'ip_fail') {
                // $this->form_validation->set_message('register_validation', 'This IP has already registered in the last ' . $ip_frequency_register . ' hours');
                // return false;
            }
            else if (! $user_id) {
                $this->form_validation->set_message('register_validation', 'Username already exists');
                return false;
            // Success
            } else {
                // Set variables
                $worlds = $this->user_model->get_all_worlds();
                $cash = 100000;
                
                // Create account for each world
                foreach ($worlds as $world)
                {
                    // Random color for each account
                    $primary_color = random_hex_color();

                    $account_id = $this->user_model->create_player_account($user_id, $world['id'], $cash, $primary_color);
                }

				// Login
                $sess_array = array();
                $sess_array = array(
                    'id' => $user_id,
                    'username' => $username,
                    'cash' => $cash
                );
                $this->session->set_userdata('logged_in', $sess_array);
                return true;
            }
        }
    }

	// Logout
    public function logout() {
        $this->session->unset_userdata('logged_in');
        redirect('', 'refresh');
    }

    // Page Not Found
	public function page_not_found()
	{
		$this->load->view('errors/page_not_found');
	}

    // Update color
    public function update_color()
    {        
        // User Information
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $user_id = $data['user_id'] = $session_data['id'];
        }
        
        // Validation
        $this->load->library('form_validation');
        $this->form_validation->set_rules('world_key_input', 'World Key Input', 'trim|required|integer|max_length[10]');
        $this->form_validation->set_rules('primary_color', 'color', 'trim|required|max_length[7]');

        $world_key = $this->input->post('world_key_input');

        // Fail
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('failed_form', 'error_block');
            $this->session->set_flashdata('validation_errors', validation_errors());
            redirect('world/' . $world_key, 'refresh');

        // Success
        } else {

            // Set color
            $primary_color = $this->input->post('primary_color');

            // Add hash
            $primary_color = '#' . $primary_color;

            // Set account
            $account = $this->user_model->get_account_by_keys($user_id, $world_key);
            $account_key = $account['id'];
            $query_action = $this->user_model->update_account_primary_color($account_key, $primary_color);

            // Redirect to game
            redirect('world/' . $world_key, 'refresh');
        }
    }
}

// Random color function for generating primary color
function random_color_part() {
    return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
}
function random_hex_color() {
    return '#' . random_color_part() . random_color_part() . random_color_part();
}