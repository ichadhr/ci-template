<?php
/**
 * Modules user controllers
 */

namespace Modules\User\Models;

use App\Models\BaseModel;
use App\Libraries\Datatable;
use App\Libraries\Obfusids;

class UserModel extends BaseModel
{
	protected $table = 'users';

	protected $hash;

	public function __construct()
	{
		parent::__construct();
		$this->hash = new Obfusids();
	}

	/**
	 * list user json for datatable
	 *
	 * @return string
	 */
	public function listJson() : string
	{
		$data = Datatable::query(
			'
                SELECT `u`.`id`,
                    `u`.`username`,
                    CONCAT_WS(" ",`u`.`first_name`, `u`.`last_name`) AS `display_name`,
                    `u`.`email`,
                    `u`.`active`,
                    `g`.`description` AS `groups`
                FROM `' . $this->configIonAuth->tables['users'] . '` AS `u`
                LEFT JOIN `' . $this->configIonAuth->tables['users_groups'] . '` AS `ug` ON `u`.`id` = `ug`.`user_id`
                LEFT JOIN `' . $this->configIonAuth->tables['groups'] . '` AS `g` ON `ug`.`group_id` = `g`.`id`
                WHERE `u`.`id` NOT IN ("1")
            '
		);

		// link email
		$data->edit('email', function ($data) {
			return '<a href="mailto:' . $data['email'] . '">' . $data['email'] . '</i></a>';
		});

		// link status
		$data->edit('active', function ($data) {
			if ('1' == $data['active']) {
				return '<button type="button" data-href="/user/deactivated/' . $this->hash->encode($data['id']) . '" class="label label-success link-deactivated" title="Edit">Active</a>';
			}

			return '<button type="button" data-href="/user/activated/' . $this->hash->encode($data['id']) . '" class="label label-default link-activated" title="Edit">Inactive</a>';
		});

		// link action
		$data->add('action', function ($data) {
			return '<a href="javascript:;" data-href="/user/edit/' . $this->hash->encode($data['id']) . '" class="text-indigo-600 link-edit" title="Edit"><i class="icon-pencil7"></i></a>';
		});

		return $data->generate();
	}
}
