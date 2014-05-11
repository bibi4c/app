<?php

class LinkParse extends AppModel {

    var $name = 'LinkParse';
    public $lessonTable = 'link_parses';
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
        ),
        'title' => array(
            'require' => array(
                'rule' => 'notEmpty',
                'message' => 'false'
            )
        ),
        'description' => array(
            'require' => array(
                'rule' => 'notEmpty',
                'message' => 'false'
            )
        )
    );

}

?>