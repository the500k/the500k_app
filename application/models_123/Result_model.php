<?php
Class Result_model extends CI_Model
{
	
 
 function result_list($limit,$status='0'){
	$result_open=$this->lang->line('open');
	$logged_in=$this->session->userdata('logged_in');
	$uid=$logged_in['uid'];
	  
		
	if($this->input->post('search')){
		 $search=$this->input->post('search');
		 $this->db->or_where('savsoft_users.email',$search);
		 $this->db->or_where('savsoft_users.first_name',$search);
		 $this->db->or_where('savsoft_users.last_name',$search);
		 $this->db->or_where('savsoft_users.contact_no',$search);
		 $this->db->or_where('result.rid',$search);
		 $this->db->or_where('savsoft_quiz.quiz_name',$search);
 
	 }else{
		 $this->db->where('result.result_status !=',$result_open);
	 }
	 	if($logged_in['su']=='0'){
			$this->db->where('result.uid',$uid);
		}
		
	 	if($status !='0'){
			$this->db->where('result.result_status',$status);
		}
		
		
		
		$this->db->limit($this->config->item('number_of_rows'),$limit);
		$this->db->order_by('rid','desc');
		$this->db->join('savsoft_users','savsoft_users.uid=result.uid');
		$this->db->join('savsoft_quiz','savsoft_quiz.quid=result.quid');
		$query=$this->db->get('result');
		return $query->result_array();
		
	 
 }
 
 function quiz_list(){
	 $this->db->order_by('quid','desc');
$query=$this->db->get('savsoft_quiz');	
return $query->result_array();	 
 }
 
 
 
 
 function remove_result($rid){
	 
	 $this->db->where('result.rid',$rid);
	 if($this->db->delete('result')){
		  $this->db->where('rid',$rid);
		  $this->db->delete('savsoft_answers');
		 return true;
	 }else{
		 
		 return false; 
	 }
	 
	 
	 
 }
 
 
 function generate_report($quid,$gid){
	$logged_in=$this->session->userdata('logged_in');
	$uid=$logged_in['uid'];
	$date1=$this->input->post('date1');
	 $date2=$this->input->post('date2');
		
		if($quid != '0'){
			$this->db->where('result.quid',$quid);
		}
		if($gid != '0'){
			$this->db->where('savsoft_users.gid',$gid);
		}
		if($date1 != ''){
			$this->db->where('result.start_time >=',strtotime($date1));
		}
		if($date2 != ''){
			$this->db->where('result.start_time <=',strtotime($date2));
		}

	 	$this->db->order_by('rid','desc');
		$this->db->join('savsoft_users','savsoft_users.uid=result.uid');
		$this->db->join('savsoft_group','savsoft_group.gid=savsoft_users.gid');
		$this->db->join('savsoft_quiz','savsoft_quiz.quid=result.quid');
		$query=$this->db->get('result');
		return $query->result_array();
 }
 
 
 
 
 
 function get_result($rid,$student_id){
	
	$uid=$student_id;
		if($logged_in['su']=='0'){
			$this->db->where('result.uid',$uid);
		}
		$this->db->where('result.rid',$rid);
	 	$this->db->join('student','student.student_id=result.student_id');
		$this->db->join('online_exam','online_exam.exam_id=result.exam_id');
		$query=$this->db->get('result');
		return $query->row_array();
	 
	 
 }
 
 
 function last_ten_result($quid){
		$this->db->order_by('percentage_obtained','desc');
		$this->db->limit(10);		
	 	$this->db->where('result.exam_id',$quid);
	 	$this->db->join('student','student.student_id=result.student_id'); 
		$this->db->join('online_exam','online_exam.exam_id=result.exam_id');
		$query=$this->db->get('result');
		return $query->result_array();
 }
 

  function get_result_list($quid){
		$this->db->order_by('percentage_obtained','desc');
		$this->db->where('result.exam_id',$quid);
	 	$this->db->join('student','student.student_id=result.student_id'); 
		$this->db->join('online_exam','online_exam.exam_id=result.exam_id');
		$query=$this->db->get('result');
		return $query->result_array();
 }
 
 
   function get_percentile($quid,$uid,$score){
  $logged_in =$this->session->userdata('logged_in');
$gid= $logged_in['gid'];
$res=array();
	$this->db->where("result.exam_id",$quid);
	 $this->db->group_by("result.student_id");
	 $this->db->order_by("result.score_obtained",'DESC');
	$query = $this -> db -> get('result');
	$res[0]=$query -> num_rows();

	
	$this->db->where("result.exam_id",$quid);
	$this->db->where("result.student_id !=",$uid);
	$this->db->where("result.score_obtained <=",$score);
	$this->db->group_by("result.student_id");
	 $this->db->order_by("result.score_obtained",'DESC');
	$querys = $this -> db -> get('result');
	$res[1]=$querys -> num_rows();
		
   return $res;
  
  
 }
 
 
 ////////////////// extraction from v5///////////////////////////


  function no_attempt($quid,$uid){

  	//echo "Hi";exit;
	 
	$query=$this->db->query(" select * from result where student_id='$uid' and exam_id='$quid' ");


		return $query->num_rows(); 
 }
 
 
 
 
 
 
 
 
 

}












?>