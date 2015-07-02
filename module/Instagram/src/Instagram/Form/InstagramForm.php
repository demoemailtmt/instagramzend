<?php

namespace Instagram\Form;

use Zend\Form\Form;
use Zend\Form\Element;
use Zend\InputFilter;
//expiration :thoi gian capchart se bi xoa
//dotNoiLever: do san sui cua hinh anh
//lineNoiLever: so duong gach ngang cua chu
class ContactForm extends Form {

    public function __construct($name = null) {
        parent:: __construct('login');
        $this->addElement($name);
        $this->addInputFilter();
    }

    public function addElement() {
        $this->setAttribute('method', 'post');

        $name = new Element\Text('name');
        $name->setLabel('Tên bạn:');
        $name->setAttributes(array("type" => "text", "autofocus" => "", "placeholder" => "nhập họ và tên", "class" => "form-control"));
        $this->add($name);
        //<input type="email" autofocus="" name="email" placeholder="E-mail" class="form-control">
        $location = new Element\Text('location');
        $location->setLabel('Địa chỉ:');
        $location->setAttributes(array("type" => "text", "autofocus" => "", "placeholder" => "nhập địa chỉ", "class" => "form-control"));
        $this->add($location);

        $phoneNumber = new Element\Text('phoneNumber');
        $phoneNumber->setLabel('Số điện thoại:');
        $phoneNumber->setAttributes(array("type" => "text", "autofocus" => "", "placeholder" => "nhập số điện thoại", "class" => "form-control"));
        $this->add($phoneNumber);

        $email = new Element\Text('email');
        $email->setLabel('Email:');
        $email->setAttributes(array("type" => "text", "autofocus" => "", "placeholder" => "nhập địa chỉ email", "class" => "form-control"));
        $this->add($email);

        $description = new Element\Textarea('description');
        $description->setLabel('Nội dung bạn chia sẻ:');
        $description->setAttributes(array("type" => "text",
            "autofocus" => "",
            "placeholder" => "nhập nội dung", 
            "class" => "form-control",
            'id' => 'description',
            'rows' => "3"));
        $this->add($description);

        $submit = new Element\Submit('submit');
        $submit->setValue('Gửi');
        $submit->setAttributes(array('class' => 'btn btn-lg btn-success btn-block'));

        $this->add($submit);
    }

// 	public function addInputFilter()
// 	{
// 		$inputFilter = new InputFilter();
// 		$Factory = new InputFactory();
// 	}
    public function addInputFilter() {
        //check for product ID
//        $inputFilter = new InputFilter\InputFilter();
//        $username = new InputFilter\Input('username');
//        $username->setRequired(true);
//        $username->getValidatorChain()->attachByName('notempty', array('message' => array('isEmpty' => 'Phai nhap du lieu')))
//                ->attachByName('StringLength', array('min' => 5, 'max' => 50, 'message' => array('stringLengthTooShort' => 'phai nhap toi thieu 5 ki tu', 'stringLengthTooLong' => 'chi nhap toi da 50 ki tu')));
//        $inputFilter->add($username);
//        //check for product name
//        $password = new InputFilter\Input('password');
//        $password->setRequired(true);
//        $password->getValidatorChain()->attachByName('notempty', array('message' => array('isEmpty' => 'Phai nhap du lieu')))
//                ->attachByName('StringLength', array('min' => 5, 'max' => 50, 'message' => array('stringLengthTooShort' => 'phai nhap toi thieu 5 ki tu', 'stringLengthTooLong' => 'chi nhap toi da 50 ki tu')));
//        $inputFilter->add($password);
//        $this->setInputFilter($inputFilter);
        $inputFilter = new InputFilter\InputFilter();

        $name = new InputFilter\Input('name');
        $name->setRequired(true);
        $name ->getValidatorChain()->attachByName('notempty',array('message'=>array('isEmpty'=>'Vui lòng nhập tên bạn')));
		//-> attachByName('StringLength',array('min'=>5,'max'=>50,'message'=>array('stringLengthTooShort'=>'phai nhap toi thieu 5 ki tu','stringLengthTooLong'=>'chi nhap toi da 50 ki tu')));
	
        $inputFilter->add($name);
        
        $phoneNumber = new InputFilter\Input('phoneNumber');
        $phoneNumber->setRequired(true);
        $phoneNumber ->getValidatorChain()->attachByName('notempty',array('message'=>array('isEmpty'=>'Vui lòng nhập số điện thoại')));
		//-> attachByName('StringLength',array('min'=>5,'max'=>50,'message'=>array('stringLengthTooShort'=>'phai nhap toi thieu 5 ki tu','stringLengthTooLong'=>'chi nhap toi da 50 ki tu')));
	
        $inputFilter->add($phoneNumber);
        
         $this->setInputFilter($inputFilter);
    }

}
