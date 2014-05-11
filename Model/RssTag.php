<?php

class RssTag extends AppModel {

    var $name = 'RssTag';
    public $lessonTable = 'rss_tags';
    public $primaryKey = 'id';
    public $belongsTo = array(
    );
    public $validate = array(
        'name' => array(
            'require' => array(
                'rule' => 'notEmpty',
                'message' => 'false'
            ),
            'unique' => array(
                'rule' => 'isUnique',
                'message' => 'false'
            )
        )
    );

}

?>