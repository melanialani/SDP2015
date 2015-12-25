<?php

class Notification extends CI_Controller{

    public function __construct(){
        parent::__construct();
    }

    public function get(){
        if($this->session->userdata('username')){
            $limit = $this->input->post('limit');
            $start = $this->input->post('start');
            $results = $this->notifikasi_model->getNotification($limit, $start);
            $dateFrom = date_create_from_format('Y-m-d H:i:s',$this->session->userdata('new_notification_from'));
            foreach ($results as $result){
                echo '<a class="content">
                        <div class="notification-item ';
                $dateNotification = date_create_from_format('Y-m-d H:i:s',$result->tanggal_create);
                if ($dateFrom < $dateNotification){
                    echo 'new';
                }
                echo '">
                        <small class="pull-right">'.date_format(date_create_from_format('Y-m-d H:i:s',$result->tanggal_create),'d M Y').'</small><h4 class="item-title">'.$result->judul.' dari '.$result->nama_asal.'</h4>
                        </div>
						</a>';
            }
        }
    }
    public function open(){
        $this->session->unset_userdata('count_new_notification');
    }
}