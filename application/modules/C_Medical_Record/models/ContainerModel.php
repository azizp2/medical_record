<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ContainerModel extends CI_Model
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
    function store($param, $user_id)
    {
        $this->db->trans_begin();

        foreach ($param['det_id'] as $key => $val) :
            if (!$this->db->get_where($this->tblContAccept, ["contid" => $param['contid'], "det_id" => $val])->row()) {
                $data[] = [
                    "contid" => $param['contid'],
                    "det_id" => $val,
                    "created_by" => $user_id,
                    "created_date" => date("Y-m-d H:i:s")
                ];
            }
        endforeach;


        // simpan header
        $this->db->insert_batch($this->tblContAccept, $data);
        // simpan header

        // simpan detail receive




        $this->db->where("contid", $param['contid']);
        $this->db->update($this->tblContHdr, [
            "is_receive" => 1,
            "receive_date" => date("Y-m-d H:i:s"),
            "receive_by" => $user_id,
        ]);
        // end simpan detail receive

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
        // end simpan detail receive
    }
    // End Save Data
}
