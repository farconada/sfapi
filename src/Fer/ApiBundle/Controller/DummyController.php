<?php
/**
 * Created by JetBrains PhpStorm.
 * User: fernando
 * Date: 18/05/13
 * Time: 11:00
 * To change this template use File | Settings | File Templates.
 */

namespace Fer\ApiBundle\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;


class DummyController {
    /**
     * @Template()
     */
    public function indexAction(){
        return array();
    }

}