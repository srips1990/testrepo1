<?php
/*******************************************************************************************************************
Class for database interactions
*******************************************************************************************************************/

	class crudEngine
	{
		private $dbo;

		function __construct($host_name, $db_name, $user_name, $pass)
		{
			$this->dbo = new PDO("mysql:host=".$host_name.";dbname=".$db_name, $user_name, $pass);
		}

/*******************************************************************************************************************
Begin transaction
*******************************************************************************************************************/

		public function beginTransaction()
		{
			$this->dbo->beginTransaction();
		}

/*******************************************************************************************************************
Commit transaction
*******************************************************************************************************************/

		public function commit()
		{
			$this->dbo->commit();
		}

/*******************************************************************************************************************
Rollback transaction
*******************************************************************************************************************/

		public function rollBack()
		{
			$this->dbo->rollBack();
		}

/*******************************************************************************************************************
Verify user login
*******************************************************************************************************************/

		public function verifyCredential($user_email, $password)
		{
			$STM = $this->dbo->prepare("SELECT user_password FROM user_masterlist WHERE user_email = '". $user_email . "' AND user_password='". $password . "'");
			$STM->execute();
			$count = $STM->rowCount();
			if ($count>0) {
				$row  = $STM->fetch(PDO::FETCH_ASSOC);
			}
			
			return ($count>0);
		}


/*******************************************************************************************************************
Get user's name, email and cell number from the database by user's email
*******************************************************************************************************************/

		public function getUserDetailsByEmail($user_email)
		{
			$STM = $this->dbo->prepare("SELECT user_id, user_name, user_email FROM user_masterlist WHERE user_email = '" . $user_email . "'");
			if (!$STM->execute())
			{
				return false;
			}
			return $STM->fetch(PDO::FETCH_ASSOC);
		}


/*******************************************************************************************************************
Get user's name, email and cell number from the database by user's email
*******************************************************************************************************************/

		public function getUserDetailsByUserId($user_id)
		{
			$STM = $this->dbo->prepare("SELECT user_id, user_name, user_email FROM user_masterlist WHERE user_id = :user_id");
			$STM->bindParam(":user_id", $user_id);
			if (!$STM->execute())
			{
				return false;
			}
			return $STM->fetch(PDO::FETCH_ASSOC);
		}


/*******************************************************************************************************************
		 * Gets user's details from Blockchain
*******************************************************************************************************************/

		public function checkIfParametersValid($email, $random)
		{
			try
			{
				$stmt = $this->dbo->prepare("SELECT email FROM access_masterlist WHERE email=:email AND random=:random");
				$stmt->bindParam(':email', $email);
				$stmt->bindParam(':random', $random);
				if (!$stmt->execute())
					throw new Exception("Error Processing Request", 1);
					
				$row  = $stmt->fetchAll();

				if(count($row) > 0)
		        	return true;
		        else
		            return false;
			}
			catch (Exception $e)
			{
				throw $e;
			}
				
		}
	}
?>