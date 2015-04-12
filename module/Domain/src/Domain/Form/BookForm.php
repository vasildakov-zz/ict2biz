<?php 
/**
 * BookForm
 *
 * @package Domain
 * @subpackage Form
 * @author Vasil Dakov <vasildakov@gmail.com>
 * @copyright Copyright (c) 2015 ict2biz (http://www.ict2biz.com/)
 */

namespace Domain\Form;

use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;
use Zend\Form\Form;
use Domain\Fieldset\BookFieldset;

class BookForm extends Form
{
    private $objectManager;

    public function __construct(ObjectManager $objectManager)
    {
        parent::__construct('book-form');

        $this->setAttribute('method', 'post');
        $this->setAttribute('role', 'form');

        // The form will hydrate an object of type "BlogPost"
        $this->setHydrator(new DoctrineHydrator($objectManager));

        // Add the user fieldset, and set it as the base fieldset
        $fieldset = new BookFieldset($objectManager);
        $fieldset->setUseAsBaseFieldset(true);
        $this->add($fieldset);

        // … add CSRF and submit elements …
        $this->add(array(
            'type' => 'Button',
            'name' => 'submit',
            'attributes' => array(
                'value' => _('Save'),
                'type'  => 'submit',
                'id' => 'submitbutton',
                'class' => 'btn btn-primary',
            ),
        ));
        
        // Optionally set your validation group here
    }
}