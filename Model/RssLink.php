<?php

class RssLink extends AppModel {

    var $name = 'RssLink';
    public $lessonTable = 'rss_links';
    public $primaryKey = 'id';
    public $belongsTo = array(
    );
    public $validate = array(
        'link' => array(
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