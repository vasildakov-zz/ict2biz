<?php
/**
 * BookFieldset
 *
 * @package Domain
 * @subpackage Fieldset
 * @author Vasil Dakov <vasildakov@gmail.com>
 * @copyright Copyright (c) 2015 ict2biz (http://www.ict2biz.com/)
 */

namespace Domain\Fieldset;

use Domain\Entity\Book;
use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;
use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;

 class BookFieldset extends Fieldset implements InputFilterProviderInterface
 {
     public function __construct(ObjectManager $objectManager)
     {
        parent::__construct('book');

        $this->setHydrator(new DoctrineHydrator($objectManager));
        $this->setObject(new Book());

        $this->add(array(
            'type' => 'Zend\Form\Element\Hidden',
            'name' => 'id'
        ));

        $this->add(array(
            'type' => 'Zend\Form\Element\Text',
            'name' => 'title',
            'options' => array(
                'label' => 'Title',
            ),
            'attributes' => array(
                'class' => 'form-control',
            )
        ));

        $this->add(array(
            'type' => 'Zend\Form\Element\Text',
            'name' => 'isbn',
            'options' => array(
                'label' => 'ISBN'
            ),
            'attributes' => array(
                'class' => 'form-control',
            ),

        ));

        $this->add(array(
            'type' => 'Zend\Form\Element\DateTime',
            'name' => 'published',
            'options' => array(
                'label' => 'Published',
                'format' => 'Y-m-d'
            ),
            'attributes' => array(
                'class' => 'form-control',
            )
        ));

        $this->add(array(
            'type' => 'Zend\Form\Element\Textarea',
            'name' => 'description',
            'options' => array(
                'label' => 'Description'
            ),
            'attributes' => array(
                'class' => 'form-control',
                'rows' => 3
            )
        ));
    }


    public function getInputFilterSpecification()
    {
        return array(
            'id' => array(
                'required' => false
            ),
            'title' => array(
                'required' => true,
                'validators' => array(
                    array(
                        'name' => "Zend\Validator\NotEmpty"
                    ),
                    array(
                        'name' => "Zend\Validator\StringLength",
                        'options' => array(
                            'min' => 3
                        )
                    ),
                ),
            ),
            'isbn' => array(
                'required' => true,
                'validators' => array(
                    array(
                        'name' => "Zend\Validator\NotEmpty"
                    ),
                    array(
                        'name' => "Zend\Validator\Isbn",
                        'options' => array(
                            'type' => \Zend\Validator\Isbn::ISBN10, // 0618260307
                        )
                    )
                ),
            ),
            'published' => array(
                'required' => true,
                'validators' => array(
                    array(
                        'name' => "Zend\Validator\Date",
                        'options' => array(
                            'format' => 'Y-m-d'
                        )
                    ),
                ),
            ),
            'description' => array(
                'required' => true,
                'validators' => array(
                    array(
                        'name' => "Zend\Validator\NotEmpty"
                    ),
                ),
            ),
        );
    }
}
