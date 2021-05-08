<?php defined('SYSPATH') OR die('No direct access allowed.');

/**
 * Class Model_User
 */
class Model_User extends Model_Auth_User
{

	// This class can be replaced or extended
	/**
	 * User is admin
	 *
	 * @return bool
	 */
	public function isAdmin()
	{
		$results =	DB::select('*')->from('roles_users')
 		->where('user_id', '=', (int) $this->id)
 		->where('role_id', 'IN', array (2))->execute();

 		return count($results) > 0;
	}

	/**
	 * Check if this is a valid frontend user
	 *
	 * @return bool
	 */
	public function isFrontendUser()
	{
	 $results =	DB::select('*')->from('roles_users')
		->where('user_id', '=', (int) $this->id)
		->where('role_id', 'IN', array (2, 3, 4))->execute();

		return count($results) > 0;
	}

} // End User Model
