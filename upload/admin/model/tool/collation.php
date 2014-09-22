<?php 
class ModelToolCollation extends Model {
	
	public function showTables($data) {
			$result = $this->db->query("show tables");
			foreach($result->rows as $row)
			{
				$rows[]=$row['Tables_in_opencart'];
			}
			
			return $rows;
		}
		
	public function changeDBType($data) {
			// change database collation
			$result = $this->db->query("ALTER DATABASE ".DB_DATABASE." DEFAULT CHARACTER SET ".$data['new_charset']." COLLATE ". $data['new_collation']);
			
			return $result;
		}
		
		public function changeTable($data) {
			// change table collation
				$result = $this->db->query("ALTER TABLE ". $data['table'] . " DEFAULT CHARACTER SET ". $data['new_charset']." COLLATE ".$data['new_collation']);

			if(isset($result)){
			$details['success']="The collation of your database has been successfully changed!";
			
			}
		return $result;
	}

}
?>
