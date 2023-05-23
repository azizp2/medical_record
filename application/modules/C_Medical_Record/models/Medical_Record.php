<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Medical_Record extends CI_Model
{
    private $tblContHdr = "ship_tbl_trn_cont_hdr";
    private $tblContLocalDet = "ship_tbl_trn_cont_local_dtl";
    private $tblContAccept = "ship_tbl_trn_cont_acceptance_dtl";


 
    // Save Data
    function store($param)
    {
        $this->db->trans_begin();
        // pasien
        $cekNik = $this->db->get_where('tb_pasien', ['nik' => $param['nik']])->row();
        if ($cekNik === null) {
            $pasien = [
                'nik' => $param['nik'],
                'nama_depan' => $param['nama_depan'],
                'nama_belakang' => $param['nama_belakang'],
                'gender' => $param['gender'],
                'alamat' => $param['alamat'],
                'catatan' => $param['catatan'],
                'golongan_darah' => $param['golongan_darah'],
            ];
            $this->db->insert('tb_pasien', $pasien);
        }
        
        // end simpan detail receive


        // anamnesa
        $cekAnamnesa = $this->db->get_where('tb_anamnesa', ['id_pasien' => $param['nik'], 'keluhan' => $param['keluhan'] ])->row();

        if($cekAnamnesa === null){
            if(strlen($param['keluhan']) > 0){
            $anamnesa = [
                'id_pasien' => $param['nik'],
                'keluhan' => $param['keluhan'],
                'tinggi_badan' => $param['tinggi_badan'],
                'berat_badan' => $param['berat_badan'],
                'tekanan_darah' => $param['tekanan_darah'],
                'pernapasan' => $param['pernapasan'],
                'detak_jantung' => $param['detak_jantung'],
                'suhu_tubuh' => $param['suhu_tubuh'],
            ];
            $this->db->insert('tb_anamnesa', $anamnesa);
            }
        }

        $cekDiagnosa = $this->db->get_where('tb_diagnosa', ['nik' => $param['nik'], 'objektif' => $param['objektif'],
        'subjektif' => $param['subjektif'],
        'assesment' => $param['assesment'],
        'planning' => $param['planning'],
         ])->row();

        if($cekDiagnosa === null){
            if(strlen($param['planning']) > 0){
            $anamnesa = [
                'nik' => $param['nik'],
                'objektif' => $param['objektif'],
                'subjektif' => $param['subjektif'],
                'assesment' => $param['assesment'],
                'planning' => $param['planning'],
            ];
            $this->db->insert('tb_diagnosa', $anamnesa);
            }
        }
        // end anamnesa

        if (!empty($param['diperiksa_oleh'])) {
            $rows = $this->db->get('tb_temp_cart')->result();
        
            $dataresep = array();
            foreach ($rows as $item) {
                $dataresep[] = array(
                    'nik' => $param['nik'],
                    'id_obat' => $item->id_obat,
                    'qty' => $item->qty,
                    'catatan' => $param['catatan'],
                    'diperiksa_oleh' => $param['diperiksa_oleh']
                );
            }
        
            if (!empty($dataresep)) {
                $this->db->insert_batch("tb_resep", $dataresep);
                $this->db->delete('tb_temp_cart');
            }
        }
        


        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }
    
    // End Save Data

    function deleteCart($id)
    {
        $this->db->where('id_obat', $id);
        $sql = $this->db->delete('tb_temp_cart');
        if($sql) return true;

        return false;

    }

    function addCart($param)
    {
        $sql = $this->db->insert('tb_temp_cart', $param);

        if($sql) return true;

        return false;
    }

    function getAllKunjungan()
    {
        $this->db->select("a.*, keluhan");
        $this->db->from('tb_pasien a');
        $this->db->join('tb_anamnesa b', 'a.nik = b.id_pasien');
        $this->db->where('a.create_date', date("Y-m-d"));
        $this->db->group_by("a.nik");
        $sql = $this->db->get();
        return $sql->result();
    }

    function getKunjunganById($id)
    {
        $this->db->select('a.*, a.catatan as catatan_pasien, keluhan, tinggi_badan, berat_badan, tekanan_darah, pernapasan, detak_jantung, suhu_tubuh,
        subjektif, objektif, assesment, planning');
        $this->db->join('tb_anamnesa b', 'a.nik = b.id_pasien', 'left');
        $this->db->join('tb_diagnosa c', 'a.nik = c.nik', 'left');
        // $this->db->join('tb_resep d', 'a.nik = d.nik', 'left');
        $this->db->where("a.id", $id);
        $this->db->group_by('a.id');
        $sql = $this->db->get("tb_pasien a")->row();

        $det_obat = $this->db->select("a.*, qty")
                        ->join('tb_obat a', 'a.id = b.id_obat')
                        ->where(['nik' => $sql->nik])
                        ->get('tb_resep b')->result();

        $data = [
            'hdr' => $sql,
            'det_obat' => $det_obat,
        ];
        return $data;
    }
}
