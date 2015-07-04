<?php

namespace Instagram\Form;

use Zend\Form\Form;
use Zend\Form\Element;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory;
use Zend\I18n\Validator;

//expiration :thoi gian capchart se bi xoa
//dotNoiLever: do san sui cua hinh anh
//lineNoiLever: so duong gach ngang cua chu
class InstagramForm extends Form {

    public function __construct($name = null) {
        parent:: __construct('instagram');
        $this->addElement($name);
        $this->addInputFilter();
    }

    public function addElement() {
        $this->setAttribute('method', 'post');

        $longtitude = new Element\Text('longtitude');
        $longtitude->setLabel('Longtitude:');
        $longtitude->setAttributes(array("type" => "text", "autofocus" => "", "placeholder" => "Longtitude", "class" => "form-control"));
        $this->add($longtitude);
        //<input type="email" autofocus="" name="email" placeholder="E-mail" class="form-control">
        $latitude = new Element\Text('latitude');
        $latitude->setLabel('Latitude:');
        $latitude->setAttributes(array("type" => "text", "autofocus" => "", "placeholder" => "Latitude", "class" => "form-control"));
        $this->add($latitude);
        $distance = new Element\Text('distance');
        $distance->setLabel('Distance:');
        $distance->setAttributes(array("type" => "text", "autofocus" => "", "placeholder" => "Distance", "class" => "form-control"));
        $this->add($distance);
    }

    public function addInputFilter() {
        $inputfilter = new InputFilter();
        $factory = new Factory();
        $inputfilter->add($factory->createInput(array(
                    'name' => 'longtitude',
                    'required' => true,
//                    'filters'  => array(
//                        array('name' => 'int','message'=>array(
//                                    'min' => 'must be number')),
//                    ),
                    'validators' => array(
                        array(
                            'name' => 'Between',
                            'options' => array(
                                'min' => -180,
                                'max' => 180,
                                'message' => array(
                                    'min' => 'must be more than %min% ',
                                    'max' => 'must be less than %max%',)
                            ),
//                            'name' => 'Float',
//                            'options' => array(
//                                'min' => -180,
//                                'max' => 180,
//                                'message' => array(
//                                    'min' => 'must be more than %min% ',
//                                    'max' => 'must be less than %max%',)
//                            )
                        )
                    )
        )));
        $inputfilter->add($factory->createInput(array(
                    'name' => 'latitude',
                    'required' => true,
//                    'filters' => array(
//                        array('name' => 'int'),
//                    ),
                    'validators' => array(
                        array(
                            'name' => 'Between',
                            'options' => array(
                                'min' => -90,
                                'max' => 90,
                                'message' => array(
                                    'min' => 'must be more than %min% ',
                                    'max' => 'must be less than %max%',)
                            ),
//                            'name' => 'Float',
//                            'options' => array(
//                                'min' => -90,
//                                'max' => 90,
//                                'message' => array(
//                                    'min' => 'must be more than %min% ',
//                                    'max' => 'must be less than %max%',)
//                            )
                        ),
                    ),
        )));
        $inputfilter->add($factory->createInput(array(
                    'name' => 'distance',
                    'required' => true,
//                    'filters' => array(
//                        array('name' => 'int'),
//                    ),
                    'validators' => array(
                        array(
                            'name' => 'Between',
                            'options' => array(
                                'min' => 0,
                                'max' => 1000,
                                'message' => array(
                                    'min' => 'must be more than %min% ',
                                    'max' => 'must be less than %max%',)
                            ),
//                            'name' => 'Float',
//                            'options' => array(
//                                'min' => 0,
//                                'max' => 1000,
//                                'message' => array(
//                                    'min' => 'must be more than %min% ',
//                                    'max' => 'must be less than %max%',)
//                            )
                        ),
                    ),
        )));
        //Latitudes range from -90 to 90.
        //Longitudes range from -180 to 180.
        $this->setInputFilter($inputfilter);
    }

}
