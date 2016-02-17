<?php
/**
 * Created by Duviel Garcia.
 * Rol: Desarrollador Web
 * Date: 9/02/16
 * Time: 04:39 PM
 */

namespace GestionBundle\Controller;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Sonata\AdminBundle\Controller\CRUDController as Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;

class CRUDController extends Controller
{

    public function descargarAction()
    {
        $object = $this->admin->getSubject();

        if (!$object) {
            throw new NotFoundHttpException(sprintf('unable to find the object with id : %s', $id));
        }

        // Be careful, you may need to overload the __clone method of your object
        // to set its id to null !
       /* $clonedObject = clone $object;

        $clonedObject->setName($object->getName().' (Clone)');

        $this->admin->create($clonedObject);

        $this->addFlash('sonata_flash_success', 'Cloned successfully');

        return new RedirectResponse($this->admin->generateUrl('list'));
*/



        $path = $this->get('kernel')->getRootDir(). "/../web/";
        $file = $path.$object->getUrldocumento();
        $content = file_get_contents($file);

        $response = new Response();

        $filename= $object->getNombre();



        $ext = substr($object->getUrldocumento(), strpos($object->getUrldocumento(), ".") + 1);

        //set headers
        $response->headers->set('Content-Type', 'mime/type');
        $response->headers->set('Content-Disposition', 'attachment;filename="'.$filename.'.'.$ext);

        $response->setContent($content);
        return $response;

        // if you have a filtererd list and want to keep your filters after the redirect
        // return new RedirectResponse($this->admin->generateUrl('list'), $this->admin->getFilterParameters());
    }
}