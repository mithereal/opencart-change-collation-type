<?php 
class ModelToolCollation extends Model {
	
	public function changeType($data) {
			// change database collation
			$this->db->query("ALTER DATABASE ".DB_DATABASE." DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci");
			$result = $this->db->query("show tables");
			
			while($tables = DB_DRIVER_fetch_array($result)) {
				$table = $tables[0];
				$this->db->query("ALTER TABLE $table DEFAULT CHARACTER SET $data['new_charset'] COLLATE $data['new_collation']");
				// loop through each column changing collation
				$columns = $this->db->query("SHOW FULL COLUMNS FROM $table where collation is not null");
					while($cols = DB_DRIVER_fetch_array($columns)) {
					$column = $cols[0];
					$type = $cols[1];
					$this->db->query("ALTER TABLE $table MODIFY $column $type CHARACTER SET $data['new_charset'] COLLATE $data['new_collation']");
					}
			}
	
}
}
?>
