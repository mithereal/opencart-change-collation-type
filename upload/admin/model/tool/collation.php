<?php 
class ModelToolCollation extends Model {
	
	public function changeType($data) {
			$details=false;
			// change database collation
			$this->db->query("ALTER DATABASE ".DB_DATABASE." DEFAULT CHARACTER SET ".$data['new_charset']." COLLATE ". $data['new_collation']);
			$result = $this->db->query("show tables");
			
			foreach($result->rows as $row){
				$rows[]=$row['Tables_in_opencart'];
			}
			
			$i=0;
			while($tables = $rows) {
				if(isset($tables[$i])){
				$table = $tables[$i];
				var_dump($table);
				echo '<br>';
				$this->db->query("ALTER TABLE ". $table . " DEFAULT CHARACTER SET ". $data['new_charset']." COLLATE ".$data['new_collation']);
				// loop through each column changing collation
			//	$columns = $this->db->query("SHOW FULL COLUMNS FROM ".$table." where collation is not null");
			//	var_dump($columns);
				//	while($cols = $columns) {
				//	$column = $cols;
					///$type = $cols[1];
				//	var_dump($cols);
					//$query=$this->db->query("ALTER TABLE ".$table." MODIFY ".$column ." ". $type ." CHARACTER SET ". //$data['new_charset'] ." COLLATE ". $data['new_collation']);
					//if(isset($query)){
					//$details[]="changed collation of $table to $new_collation";
					//}
				//	}
					$i++;
			}}

		if(isset($details)){
			$details['success']="The collation of your database has been successfully changed!";
		}
	return json_encode($result);
}

}
?>
