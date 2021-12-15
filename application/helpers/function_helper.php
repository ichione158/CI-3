<?php 

	function addProjectReport($project_id,$investor_id){

        $CI = &get_instance();

        $reports = $CI->Report->getAll();

        foreach($reports as $report){

            $data = Array(
                'project_id'    => $project_id,
                'investor_id'   => $investor_id,
                'report_id'     => $report->id,
                'createdTime'   => Date('Y-m-d H:i:s'),
            );
            $CI->projectReport->add_pr($data);
        }
    }

    function sendMail($to_email, $message, $title){
        $CI = &get_instance();
        $from_email = "cctpn.icons@gmail.com";
        $CI->email->set_newline("\r\n");
        $CI->email->from($from_email, 'MOC');
        $CI->email->to($to_email);
        $CI->email->subject($title);
        $CI->email->message($message);
        return $CI->email->send();
    }

    function randomPassword() {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array();
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 10; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //return chuỗi password
    }