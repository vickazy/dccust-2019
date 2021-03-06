<?php
    class ModelTracerStudyDetail extends dbHelper
    {
        public function __construct($db_config){
            $this->db= new dbHelper($db_config);
        }
        
        public function get_tracer_studies_detail($id=NULL)
        {
            if ( empty($id) ) {
                return $this->db->get_select("SELECT * FROM tracer_studies_detail AS td LEFT JOIN tracer_studies AS t ON t.tracer_study_id=td.tracer_study_id WHERE td.tracer_study_detail_date={$_GET['tahun']} ORDER BY t.tracer_study_sort")['data'];
                
            } else {
                return $this->db->get_select("SELECT * FROM tracer_studies_detail WHERE tracer_study_detail_id='{$id}' ")['data'];

            }
            
        }

        public function insert_tracer_studies_detail()
        {
            $table                  = 'tracer_studies_detail';
            $columnsArray           = [
                'tracer_study_detail_title'=> $this->post['tracer_study_detail_title'],
                'tracer_study_id'=> $this->post['tracer_study_id'],
            ];
            $requiredColumnsArray   = array_keys($columnsArray);
            
            # insert into tracer_studies
            $insert= $this->db->insert($table, $columnsArray, $requiredColumnsArray)['status'];

            return ($insert=='success') ? TRUE : FALSE ;
        }

        public function update_tracer_studies_detail()
        {
            $table                  = 'tracer_studies_detail';
            $columnsArray           = [
                'tracer_study_detail_title'=> $this->post['tracer_study_detail_title'],
                'tracer_study_id'=> $this->post['tracer_study_id'],
            ];
            $where                  = [
                'tracer_study_detail_id'=> $this->post['tracer_study_detail_id']
            ];
            $requiredColumnsArray   = array_keys($columnsArray);
            
            # update set tracer_studies
            $update= $this->db->update($table, $columnsArray, $where, $requiredColumnsArray)['status'];

            return ($update=='success') ? TRUE : FALSE ;
        }

        public function delete_tracer_studies_detail()
        {

        }

        # kategori
        public function get_tracer_studies($id=NULL)
        {
            if ( empty($id) ) {
                return $this->db->get_select("SELECT * FROM tracer_studies WHERE tracer_study_date={$_GET['tahun']} ORDER BY tracer_study_sort")['data'];
                // return $this->db->get_select("SELECT *,(SELECT COUNT(tracer_study_id) FROM tracer_studies AS t_mod WHERE t_mod.tracer_study_parent=t.tracer_study_id) AS childs FROM tracer_studies AS t HAVING childs=0 ORDER BY t.tracer_study_sort")['data'];
                
            } else {
                return $this->db->get_select("SELECT * FROM tracer_studies WHERE tracer_study_id='{$id}' tracer_study_date={$_GET['tahun']} ")['data'];

            }
            
        }
    }
    