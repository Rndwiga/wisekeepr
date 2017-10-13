<?php

class Model_Queue extends Orm\Model {

    protected static $_properties = array(
        'id',
        'id_user',
        'url',
        'date_time',
        'processed',
        'email_sent',
        'zip_path',
    );
    protected static $_belongs_to = array(
        'user' => array(
            'key_from' => 'id_user',
            'model_to' => 'Model_User',
            'key_to' => 'id_user',
            'cascade_save' => true,
            'cascade_delete' => false,
        )
    );
    protected static $_table_name = 'queue';
    protected static $_primary_key = array('id');

}
