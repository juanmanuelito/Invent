<?php 
namespace inventarioBundle\Form\DataTransformer;

use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;
use Doctrine\Common\Persistence\ObjectManager;
use inventarioBundle\Entity\TabGeneraDepart;

class IssueToNumberTransformer implements DataTransformerInterface
{
    /**
     * @var ObjectManager
     */
    private $om;

    /**
     * @param ObjectManager $om
     */
    public function __construct(ObjectManager $om)
    {
        $this->om = $om;
    }

    /**
     * Transforma un objeto (``issue``) a una cadena (``number``).
     *
     * @param  Issue|null $issue
     * @return string
     */
    public function transform($issue)
    {
        if (null === $issue) {
            return "";
        }

        return $issue->codDepart();
    }

    /**
     * Transforma una cadena (``number``) a un objeto (``issue``).
     *
     * @param  string $number
     *
     * @return Issue|null
     *
     * @throws TransformationFailedException si no encuentra el objeto (issue).
     */
    public function reverseTransform($number)
    {
        if (!$number) {
            return null;
        }

        $issue = $this->om
            ->getRepository('inventarioBundle:TabGeneraDepart')
            ->findOneBy(array('codDepart' => $number))
        ;

        if (null === $issue) {
            throw new TransformationFailedException(sprintf(
                'An issue with number "%s" does not exist!',
                $number
            ));
        }

        return $issue;
    }
}