<?php

class Model_User extends \Orm\Model {

    protected static $_properties = array(
        'id_user',
        'email',
        'ip',
        'country',
        'country_code',
        'region',
        'region_name',
        'city',
        'zip',
        'lat',
        'lon',
        'timezone',
        'isp',
        'org',
        'as',
        'last_update'
    );
    protected static $_has_many = array(
        'downloads' => array(
            'key_from' => 'id_user',
            'model_to' => 'Model_Queue',
            'key_to' => 'id_user',
            'cascade_save' => true,
            'cascade_delete' => false,
        )
    );
    protected static $_table_name = 'user';
    protected static $_primary_key = array('id_user');

}
