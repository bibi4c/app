
<?php

App::uses('Xml', 'Utility');

class ParsesController extends AppController {

    public $uses = array('LinkParse',
        'RssLink'
    );
    //var $feed_url = "http://vnexpress.net/rss/tin-moi-nhat.rss";
    //var $feed_url = "http://www.dantri.com.vn/trangchu.rss";
    var $feed_url = "http://www.24h.com.vn/upload/rss/tintuctrongngay.rss";
    var $rss_item = array();

    function read() {

        $url_array = $this->RssLink->find('all', array(
            'conditions' => array('RssLink.deleted' => 0),
            'fields' => array('RssLink.link', 'RssLink.rss_tag_id')
        ));
        $url_test = 'http://localhost:8080/datn/services/api/people.getList/1/10';
        //$array_tests = file_get_contents($url_test);
        foreach ($url_array as $url) {
            $rss_tag_id = $url['RssLink']['rss_tag_id'];
            $rss_link = $url['RssLink']['link'];
            $parsed_xml = Xml::build($rss_link);
            $this->rss_item = Xml::toArray($parsed_xml);
            //pr($this->rss_item['rss']['channel']['item']);
            foreach ($this->rss_item['rss']['channel']['item'] as $item) {
                if (isset($item['link']) && $item['link'] != NULL) {
                    $tmp = array();
                    $tmp['LinkParse']['title'] = $item['title'];
                    $tmp['LinkParse']['description'] = $item['description'];
                    $tmp['LinkParse']['pub_date'] = date('Y-m-d H:i:s', strtotime($item['pubDate']));
                    $tmp['LinkParse']['link'] = $item['link'];
                    $tmp['LinkParse']['rss_tag_id'] = $rss_tag_id;
                    $tmp['LinkParse']['create_time'] = date('Y-m-d H:i:s');
                    if ($this->LinkParse->saveAll($tmp)) {
                        
                    }
                }
            }
        }
        $this->set('data', array());
    }

}

?>