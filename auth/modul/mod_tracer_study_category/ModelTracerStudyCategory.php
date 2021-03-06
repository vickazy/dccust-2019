<?php
    class ModelTracerStudyCategory extends dbHelper
    {
        public function __construct($db_config){
            $this->db= new dbHelper($db_config);
        }
        
        public function get_tracer_studies($id=NULL)
        {
            if ( empty($id) ) {
                return $this->db->get_select("SELECT *,(SELECT COUNT(tracer_study_id) FROM tracer_studies AS t_mod WHERE t_mod.tracer_study_parent=t.tracer_study_id) AS childs FROM tracer_studies AS t WHERE t.tracer_study_parent={$this->parent_id} AND t.tracer_study_date={$_GET['tahun']} ORDER BY t.tracer_study_sort ASC")['data'];
                
            } else {
                return $this->db->get_select("SELECT * FROM tracer_studies WHERE tracer_study_id='{$id}' ")['data'];

            }
            
        }

        public function insert_tracer_studies()
        {
            $table                  = 'tracer_studies';
            $columnsArray           = [
                'tracer_study_sort'=> $this->post['tracer_study_sort'],
                'tracer_study_title'=> $this->post['tracer_study_title'],
                'tracer_study_parent'=> $this->post['tracer_study_parent'],
                'tracer_study_form_type'=> $this->post['tracer_study_form_type'],
                'tracer_study_date'=> $this->post['tahun']
            ];
            
            # start optional fields default is empty
            if ( $this->post['tracer_study_desc'] ) 
                $columnsArray['tracer_study_desc'] = $this->post['tracer_study_desc'];            
            # end optional fields default is empty

            $requiredColumnsArray   = array_keys($columnsArray);
            
            # insert into tracer_studies
            $insert= $this->db->insert($table, $columnsArray, $requiredColumnsArray)['status'];

            return ($insert=='success') ? TRUE : FALSE ;
        }

        public function update_tracer_studies()
        {
            $table                  = 'tracer_studies';
            $columnsArray           = [
                'tracer_study_sort'=> $this->post['tracer_study_sort'],
                'tracer_study_title'=> $this->post['tracer_study_title'],
                'tracer_study_parent'=> $this->post['tracer_study_parent'],
                'tracer_study_form_type'=> $this->post['tracer_study_form_type']
            ];
            # start optional fields default is empty
            if ( $this->post['tracer_study_desc'] ) 
                $columnsArray['tracer_study_desc'] = $this->post['tracer_study_desc'];            
            # end optional fields default is empty
            $where                  = [
                'tracer_study_id'=> $this->post['tracer_study_id']
            ];
            $requiredColumnsArray   = array_keys($columnsArray);
            
            # update set tracer_studies
            $update= $this->db->update($table, $columnsArray, $where, $requiredColumnsArray)['status'];

            return ($update=='success') ? TRUE : FALSE ;
        }

        public function delete_tracer_studies()
        {

        }
    }
    