<?php
if(!function_exists('sendEmail')){
	function sendEmail($message_config=[], $redirect = FALSE)	
	{
		$CI = get_instance();
		$config['protocol']  = "smtp";
        $config['smtp_host'] = "ssl://smtp.gmail.com";
        $config['smtp_port'] = "465";
        $config['smtp_user'] = "dabelyubouquet@gmail.com"; //email pengirim
        $config['smtp_pass'] = "111dabel";//password email pengirim
        $config['charset']   = "utf-8";
        $config['mailtype']  = "html";
        $config['newline']   = "\r\n";
        $config['starttls']  = TRUE;
        
        
        $CI->email->initialize($config);
		$CI->email->from('dabelyubouquet@gmail.com', 'ADMIN Rumah Kreatif Mawar');
		$CI->email->to($message_config['recipients']); //email penerima
        $CI->email->subject($message_config['subject']); //subject email
        $CI->email->message($message_config['htmlContent']); //pesan email
        if ($CI->email->send()) {
            successMessage($message_config['success_message']);
            if($redirect){
				redirect('user/login');
            }
        } else {
            show_error($CI->email->print_debugger());
        }
	}
}

if(!function_exists('successMessage')){
	function successMessage($message)
	{
		return $message;
	}
}