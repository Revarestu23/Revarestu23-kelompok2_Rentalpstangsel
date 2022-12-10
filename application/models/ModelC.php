<?php
defined('BASEPATH') or exit('No direct script access allowed');
class ModelC extends CI_Model
{

    public function getConsole()
    {
        return $this->db->get('console');
    }
    public function consoleWhere($where)
    {
        return $this->db->get_where('console', $where);
    }
    public function simpanConsole($data = null)
    {
        $this->db->insert('console', $data);
    }
    public function updateConsole($data = null, $where = null)
    {
        $this->db->update('console', $data, $where);
    }
    public function hapusConsole($where = null)
    {
        $this->db->delete('console', $where);
    }
    public function total($field, $where)
    {
        $this->db->select_sum($field);
        if (!empty($where) && count($where) > 0) {
            $this->db->where($where);
        }
        $this->db->from('console');
        return $this->db->get()->row($field);
    }

    public function getMember()
    {
        return $this->db->get('member');
    }
    public function memberWhere($where)
    {
        return $this->db->get_where('member', $where);
    }
    public function simpanMember($data = null)
    {
        $this->db->insert('member', $data);
    }
    public function updateMember($data = null, $where = null)
    {
        $this->db->update('member', $data, $where);
    }
    public function hapusMember($where = null)
    {
        $this->db->delete('member', $where);
    }
    public function totale($field, $where)
    {
        $this->db->select_sum($field);
        if (!empty($where) && count($where) > 0) {
            $this->db->where($where);
        }
        $this->db->from('member');
        return $this->db->get()->row($field);
    }

    public function getKategori()
    {
        return $this->db->get('kategori');
    }
    public function kategoriWhere($where)
    {
        return $this->db->get_where('kategori', $where);
    }
    public function simpanKategori($data = null)
    {
        $this->db->insert('kategori', $data);
    }
    public function hapusKategori($where = null)
    {
        $this->db->delete('kategori', $where);
    }
    public function updateKategori($where = null, $data = null)
    {
        $this->db->update('kategori', $data, $where);
    }
    //join
    public function joinKategoriconsole($where)
    {
        $this->db->select('console.id_kategori,kategori.nama_kategori');
        $this->db->from('console');
        $this->db->join('kategori', 'kategori.id_kategori = console.id_kategori');
        $this->db->where($where);
        return $this->db->get();
    }

    public function getRole()
    {
        return $this->db->get('role');
    }
    public function roleWhere($where)
    {
        return $this->db->get_where('role', $where);
    }
    public function simpanRole($data = null)
    {
        $this->db->insert('role', $data);
    }
    public function hapusRole($where = null)
    {
        $this->db->delete('role', $where);
    }
    public function updateRole($where = null, $data = null)
    {
        $this->db->update('role', $data, $where);
    }
    //join
    public function joinMemberrole($where)
    {
        $this->db->select('member.id_member,role.role');
        $this->db->from('member');
        $this->db->join('role', 'role.id = member.id_member');
        $this->db->where($where);
        return $this->db->get();
    }
}
