<?php 
class Model1 extends CI_Model{
    public function __construct(){
        $this->load->database();
    }

    public function login($log,$pw){
    $this->load->library('session');
    $data=array('login'=>$log,'pw'=>$pw);
    $this->db->where($data);
    $query=$this->db->get('medecin');
    //  echo "Nom :".$query->row()->Nom."| Prenom :".$query->row()->prenom;
     if($query->num_rows()==1){
       $user=array('photo'=>$query->row()->photo,'id'=>$query->row()->id,'nom'=>$query->row()->Nom,'prenom'=>$query->row()->prenom,'login'=>$query->row()->login,'pw'=>$query->row()->pw,'Specialter'=>$query->row()->Specialter,'role'=>"medecin");
    $this->session->set_userdata($user);

      echo $this->session->userdata('role');

     }else{
      $data=array('login'=>$log,'pw'=>$pw);
      $this->db->where($data);  
      $query=$this->db->get('pharmacien');
      if($query->num_rows()==1){
      $user=array('id'=>$query->row()->id,'nom'=>$query->row()->nom,'prenom'=>$query->row()->prenom,'login'=>$query->row()->login,'pw'=>$query->row()->pw,'photo'=>$query->row()->photo,'role'=>"pharmacien");
      $this->session->set_userdata($user);
      echo $this->session->userdata('role');

      }
      else{
        echo "SVP le login au le mot de passe est invalide !!";
      }
    }

  }
  public function singin($data){
    if($data['role']=='Medcin'){
     $condition=array('Nom'=>$data['nom'],'prenom'=>$data['prenom']);
     $this->db->where($condition);
     if( $this->db->get('medecin')->num_rows()==0){
      $this->db->where('login',$data['login']);
      if($this->db->get('medecin')->num_rows()==0){
        $this->db->where('pw',$data['pw']);
        if($this->db->get('medecin')->num_rows()==0){
         $config['upload_path']='./medecin/';
         $config['allowed_types']='*';
         $config['file_name']=$data['nom']."_".$data['prenom'];
         $this->load->library('upload',$config);
         if($this->upload->do_upload('photo')){
                          

           $this->db->insert('medecin',array('Nom'=>$data['nom'],'prenom'=>$data['prenom'],'login'=>$data['login'],'pw'=>$data['pw'],'photo'=>$data['nom'].'_'.$data['prenom'].$data['ext'],'Specialter'=>$data['specialiter']));
           $this->db->where(array('login'=>$data['login'],'pw'=>$data['pw']));
           $query=   $this->db->get('medecin');
           $user=array('id'=>$query->row()->id,'nom'=>$query->row()->Nom,'prenom'=>$query->row()->prenom,'login'=>$query->row()->login,'pw'=>$query->row()->pw,'photo'=>$query->row()->photo,'role'=>"pharmacien");
           $this->session->set_userdata($user);
      
           echo "medecin";
         }else
         echo $this->upload->display_errors();
        }else
        echo "SVP cet mot de passe est exist deja !!";
      }else
      echo "SVP cet login exist deja !!";
     }else
      echo "SVP le nom et le prenom exist deja !!";
    }else{
      $condition=array('nom'=>$data['nom'],'prenom'=>$data['prenom']);
      $this->db->where($condition);
      if( $this->db->get('pharmacien')->num_rows()==0){
       $this->db->where('login',$data['login']);
       if($this->db->get('pharmacien')->num_rows()==0){
         $this->db->where('pw',$data['pw']);
         if($this->db->get('pharmacien')->num_rows()==0){
          $config['upload_path']='./pharmacien/';
          $config['allowed_types']='*';
          $config['file_name']=$data['prenom'].' '.$data['nom'];
          $this->load->library('upload',$config);
          if($this->upload->do_upload('photo')){
            $this->db->insert('pharmacien',array('nom'=>$data['nom'],'prenom'=>$data['prenom'],'login'=>$data['login'],'pw'=>$data['pw'],'photo'=>$data['nom'].'_'.$data['prenom'].$data['ext']));
            $this->db->where(array('login'=>$data['login'],'pw'=>$data['pw']));
            $query=   $this->db->get('pharmacien');
           $user=array('id'=>$query->row()->id,'nom'=>$query->row()->nom,'prenom'=>$query->row()->prenom,'login'=>$query->row()->login,'pw'=>$query->row()->pw,'photo'=>$query->row()->photo,'role'=>"pharmacien");
           $this->session->set_userdata($user);
            echo "pharmacien";
          }else
          echo $this->upload->display_errors();
         }else
         echo "SVP cet mot de passe est exist deja !!";
       }else
       echo "SVP cet login exist deja !!";
      }else
       echo "SVP le nom et le prenom exist deja !!";
 
    }
  }
  public function actualiserP(){
    $this->db->from('patient');
    $this->db->order_by('id','desc');
    $q=$this->db->get();
    $s="";
    foreach($q->result() as $row){
      $s=$s."<div class='boxP'><div class='circle'><img class='imgP'><h4>$row->CIN</h4></div><div class='infoP'><p style='color:black'><span>Prenom :</span> $row->prenom</p><p style='color:black'><span>Nom :</span>$row->nom</p><p style='color:black'><span>Date :</span>$row->dateNaissance</p><input type='button' class='btnOP5' title='supprimer' onclick='deleteP($row->id);'/>&nbsp;<input type='button' class='btnOP4' title='modifier' onclick='updateP($row->id,$row->CIN,$row->nom,$row->prenom,$row->dateNaissance);' />&nbsp;<input type='button' class='btnOP3' title='detail' onclick='detailP($row->id);'/></div></div>";
    }
    echo $s;
  }
  public function chercher_patient($data){
    $q1="select * from patient";
    $q2="select * from patient";
    $q3="select * from patient";
    $q4="select * from patient";    
    if($data['cin']!=""){
      $q1="select * from patient where CIN like '".$data['CIN']."'";
    }
    if($data['nom']!=""){
      $q2="select * from patient where nom like '".$data['nom']."'";
    }
    if($data['prenom']!=""){
      $q3="select * from patient where prenom like '".$data['prenom']."'";
    }
    if($data['date']!=""){
      $q3="select * from patient where dateNaissance like '".$data['date']."'";
    }
        $query=$q1." INTERSECT ( ".$q2." INTERSECT (".$q3." INTERSECT (".$q4.")) )";
        $q=$this->db->query($query);
        $s="";
    foreach($q->result() as $row){
      $s=$s."<div class='boxP'><div class='circle'><img class='imgP'><h4>$row->CIN</h4></div><div class='infoP'><p style='color:black'><span>Prenom :</span> $row->prenom</p><p style='color:black'><span>Nom :</span>$row->nom</p><p style='color:black'><span>Date :</span>$row->dateNaissance</p><input type='button' class='btnOP5' title='supprimer' onclick='deleteP($row->id);'/>&nbsp;<input type='button' class='btnOP4' title='modifier' onclick='updateP($row->id,$row->CIN,$row->nom,$row->prenom,$row->dateNaissance);' />&nbsp;<input type='button' class='btnOP3' title='detail' onclick='detailP($row->id);'/></div></div>";
    }
    echo $s;
  
  }
}














