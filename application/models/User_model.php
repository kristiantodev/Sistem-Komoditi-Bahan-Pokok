<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{
    private $_table = "user";
    
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_user" => $id])->row();
    }

    public function getById2($id)
    {
      $this->db->select('*');
      $this->db->join('instansi', 'alumni.id_instansi = instansi.id_instansi');
      $this->db->join('prodi', 'alumni.id_prodi = prodi.id_prodi');
      $this->db->join('user', 'alumni.id_user = user.id_user');
      $this->db->from('alumni');
      $this->db->where('alumni.id_user', $id);
      $this->db->limit(1);
      $query = $this->db->get();
        return $query->row();
    }

    public function getById3($id)
    {
      $this->db->select('*');
      $this->db->join('instansi', 'stakeholder.id_instansi = instansi.id_instansi');
      $this->db->join('user', 'stakeholder.id_user = user.id_user');
      $this->db->from('stakeholder');
      $this->db->where('stakeholder.id_user', $id);
      $this->db->limit(1);
      $query = $this->db->get();
        return $query->row();
    }
    
    function saveuser($idku, $username, $pass, $level, $foto){ 
        $hsl=$this->db->query("INSERT INTO user (id_user, username, password, level, foto) VALUES ('$idku', '$username','$pass', '$level','$foto')");
        return $hsl;
    }

    function edituser($idku, $username){ 
        $this->db->set('username', $username);
        $this->db->where('id_user', $idku);
        $hsl = $this->db->update('user');
        return $hsl;
    }

    public function delete($id)
    {
        $this->_deleteImage($id);
        return $this->db->delete($this->_table, array("id_user" => $id));
    }

    private function _deleteImage($id)
    {
    $alum = $this->getById($id);
    if ($alum->foto != "default.jpg") {
        $filename = explode(".", $alum->foto)[0];
        return array_map('unlink', glob(FCPATH."assets/images/users/$filename.*"));
    }
}


    

}
