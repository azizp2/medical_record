<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Medical_Record extends CI_Model
{
    private $tblContHdr = "ship_tbl_trn_cont_hdr";
    private $tblContLocalDet = "ship_tbl_trn_cont_local_dtl";
    private $tblContAccept = "ship_tbl_trn_cont_acceptance_dtl";


    // Outward
    function getAllOutwardByParam($param)
    {
        if (isset($param['shipment_date'])) {
            $this->db->where("shipmentdate", $param['shipment_date']);
        }

        if (isset($param['eta'])) {
            $this->db->where("eta", $param['eta']);
        }
        $this->db->where("tipe", 1);

        $hdr = $this->db->get($this->tblContHdr)->row();

        // zhl_pur_tbl_mst_supplier
        // zhl_mar_tblmst_customer

        $this->db->select("a.*, stuffing_name, name_supp, customer_name");
        $this->db->join("zhl_shp_tblmst_stuffing_local b", "b.stuffing_abbr = a.stuffing");
        $this->db->join("zhl_ship_tbl_mst_supp_whs_for_cont c", "c.id_supp = a.supplier", "left");
        $this->db->join("zhl_mar_tblmst_customer d", "d.customer_code = a.customer", "left");
        $this->db->where(["contid" => $hdr->contid]);
        $det = $this->db->get($this->tblContLocalDet . " a")->result();


        $data = [
            "contHdr" => $hdr,
            "contLocalDetail" => $det,
        ];

        return $data;
    }

    // End Outward

    function getContainerReceived($isReceived, $contid)
    {
        $this->db->select("a.*");
        $this->db->where("contid", $contid);
        if ($isReceived == true) {
            $this->db->where("id in(select det_id from ship_tbl_trn_cont_acceptance_dtl)", false, false);
        } else {
            $this->db->where("id not in(select det_id from ship_tbl_trn_cont_acceptance_dtl)", false, false);
        }

        return $this->db->get($this->tblContLocalDet . " a")->result();
    }


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


        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }
    // End Save Data
}
