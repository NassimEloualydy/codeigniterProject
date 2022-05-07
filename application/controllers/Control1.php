<?php 
class Control1 extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('Model1');
    }
    public function connexion(){
        $login=$this->input->post('login');
        $pw=$this->input->post('pw');
        echo $this->Model1->login($login,$pw);
    }
    public function inscrire(){
        $data=array('ext'=>$this->input->post('ext'),'nom'=>$this->input->post('nom'),
        'prenom'=>$this->input->post('prenom'),
        'login'=>$this->input->post('login'),
        'pw'=>$this->input->post('pw'),
        'photo'=>$this->input->post('photo'),
        'role'=>$this->input->post('role'),
        'specialiter'=>$this->input->post('specilaliter'));
        echo $this->Model1->singin($data);
    }
    public function espace(){
        if($this->session->userdata('nom')){
            $this->load->view('espace.php');
        }
        else{
            $this->load->view('login.php');
        }        
      }
      public function login(){
          $this->load->view('login.php');
      }
    //   echo $this->session->userdata('nom');
      public function getcompt(){
        echo $this->session->userdata('nom').' '.$this->session->userdata('prenom').'.'.$this->session->userdata('photo').'.'.$this->session->userdata('role');

      }
      
      public function logout(){
        $this->session->sess_destroy();         
      } 
public function chercheP(){
  $data=array('cin'=>$this->input->post('cin'),'nom'=>$this->input->post('nom'),'prenom'=>$this->input->post('prenom'),'date'=>$this->input->post('date'));
  echo $this->Model1->chercher_patient($data);
}
public function actualiseP(){
  echo $this->Model1->actualiserP();
}
}



















