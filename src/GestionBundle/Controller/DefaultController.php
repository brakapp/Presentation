<?php

namespace GestionBundle\Controller;


use GestionBundle\Entity\Contacto;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\BrowserKit\Response;
use Symfony\Component\HttpFoundation\Request;
use GestionBundle\Form\CurriculumsType;
use GestionBundle\Form\ProveedoresType;
use GestionBundle\Form\ContactoType;
use GestionBundle\Entity\Curriculums;
use GestionBundle\Entity\Proveedores;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController extends Controller
{



    /**
     * @Route("/home/trabajeconnosotros", name="home_curriculum")
     */
    public function hojadeVidaAction(Request $request)
    {
        $session = new Session();
        $curriculum = new Curriculums();
        $form = $this->createForm(new CurriculumsType(), $curriculum);

        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($curriculum);
            $curriculum->upload();
            $em->flush();

            

            $session->getFlashBag()->add('Mensaje','Hoja de Vida enviada');

            return $this->render('GestionBundle:Default:succescv.html.twig', array('mensaje'=>'Hemos recivido tu hoja de vida, nos comunicaremos contigo'));
            // Formulario enviado
            //die;
        }
        return $this->render('GestionBundle:Default:hojadevida.html.twig', array(
            'form' => $form->createView()
        ));
    }

    /**
     * @Route("/home/serproveedor", name="home_proveedor")
     */
    public function proveedorAction(Request $request)
    {
        $session = new Session();
        $proveedor = new Proveedores();
        $form = $this->createForm(new ProveedoresType(), $proveedor);

        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($proveedor);
            $proveedor->upload();
            $em->flush();

            $session->getFlashBag()->add('Mensaje','Propuesta enviada');

            return $this->render('GestionBundle:Default:succescv.html.twig', array('mensaje'=>'Su propuesta ha sido recivida'));
            // Formulario enviado
            //die;
        }
        return $this->render('GestionBundle:Default:proveedor.html.twig', array(
            'form' => $form->createView()
        ));
    }

    /**
     * @Route("/home/contactar", name="home_contactar")
     */
    public function contactoAction(Request $request)
    {
        $session = new Session();
        $contacto = new Contacto();
        $form = $this->createForm(new ContactoType(), $contacto);

        $form->handleRequest($request);


        if ($form->isValid()) {
            //recoleccion de datos de la entidad
            $nombre = $contacto->getNombre();
            $email = $contacto->getEmail();
            $telefono = $contacto->getTelefono();
            $mensaje = $contacto->getMensaje();
            $dpto = $contacto->getDpto()->getId();

            //recoleccion de los correos del departamento seleccionado
            $em = $this->getDoctrine()->getManager();
            $em->persist($contacto);
            $em->flush();

            $session->getFlashBag()->add('Mensaje','Mensaje enviado');

            //recoleccion de las variables del formulario para el envio del correo electronico 
            
            //$nombre = $form["nombre"]->getData();
            

            $personalRepository = $em->getRepository('GestionBundle:Personal');
            $personal = $personalRepository->getPersonal($dpto);
            $dat = array();
            foreach ($personal as $key => $value) {
                $dat[] = $value['email'];
            }

            $dat[] = "mercadeo@orbesa.com.co";
            $dat[] = "duviel7@gmail.com";
            $dat[] = "duviel@ymail.com";

            #envio del correo al encargado del departamento seleccionado
            $messageObject = \Swift_Message::newInstance()
            ->setSubject($dpto = $contacto->getDpto())
            ->setFrom('admin@orbesa.com.co')
            ->setTo("mercadeo@orbesa.com.co")
            ->setBody("Nombre: ".$nombre."\n"
                ."Email: ".$email."\n"
                ."Telefono: ".$telefono."\n"
                ."mensaje: \n".$mensaje
                );
            $this->get('mailer')->send($messageObject);
            //return new JsonResponse($dat);
            
            return $this->render('GestionBundle:Default:succescv.html.twig', array('mensaje'=>'Su mensaje ha sido recivido, muchas gracias por contactarnos'.$nombre));
            // Formulario enviado
            //die;
        }
        return $this->render('GestionBundle:Default:contactar.html.twig', array(
            'form' => $form->createView()
        ));
    }

    /**
     * @Route("/home/proyecto/{item}", name="home_proyectos")
     */
    public function proyectosAction($item)
    {
        $em = $this->getDoctrine()->getManager();
        //carga de los proyectos
        $proyectoRepository = $em->getRepository('GestionBundle:Proyectos');
        $proyecto = $proyectoRepository->getProyecto($item);

        //carga de las imagenes del slider del proyecto
        $sliderRepository = $em->getRepository('GestionBundle:Slider');
        $slider = $sliderRepository->getSliderProyecto($item);

        $proyectoimgRepository = $em->getRepository('GestionBundle:Proyectoimg');
        $proyectogalery = $proyectoimgRepository->getAllImagenesProyecto($item);

        //carga de los planos del proyecto
        $planosRepository = $em->getRepository('GestionBundle:Planos');
        $planos = $planosRepository->getPlanosProyecto($item);

        //carga la ubicacion
        $geoRepository = $em->getRepository('GestionBundle:Proyectogeo');
        $geo = $geoRepository->getImagenProyecto($item);

        return $this->render('GestionBundle:Default:proyecto.html.twig', array(
            'proyectData'=> $proyecto,
            'imagenes' => $slider,
            'planos' => $planos,
            'geos' => $geo,
            'galeria' => $proyectogalery
        ));
    }

    /**
     * @Route("/home/galeria/{item}", name="home_galeria")
     */
    public function galeriaAction($item)
    {
        $em = $this->getDoctrine()->getManager();

        //carga de las imagenes del slider del proyecto
        $proyectoimgRepository = $em->getRepository('GestionBundle:Proyectoimg');
        $proyectogeo = $proyectoimgRepository->getAllImagenesProyecto($item);

        return $this->render('GestionBundle:Default:galeria.html.twig', array(
            'imagenes' => $proyectoimg
        ));
    }

    /**
     * @Route("/home/proyectos", name="home_proyecto")
     */
    public function proyectoAction()
    {
        $em = $this->getDoctrine()->getManager();
        //carga de los proyectos
        $proyectosRepository = $em->getRepository('GestionBundle:Proyectos');
        $proyectos = $proyectosRepository->getProyectos();

        return $this->render('GestionBundle:Default:proyectos.html.twig', array('proyectData'=> $proyectos));


    }


    /**
     * @Route("/home/{page}", defaults={"page" = "index"}, name="home_page")
     */

    public function staticPagesAction($page)
    {
        if(true)
        {
            return $this->render('GestionBundle:Default:'.$page.'.html.twig');
        }
       else{
           throw $this->createNotFoundException("Pagina no encontrada");
       }
    }

    /**
     * @Route("/dale")
     */
    public function daleAction()
    {
        /*$this->get('request')->request->get('name');
        # envio del correo al encargado del departamento seleccionado
            $messageObject = \Swift_Message::newInstance()
            ->setSubject('Subject')
            ->setFrom('admin@brakapp.com')
            ->setTo(array('duviel7@gmail.com','danieleangarita@hotmail.com'))
            ->setBody('DArius pentakill');
            $this->get('mailer')->send($messageObject);

            return new Response("Master");*/

            $em = $this->getDoctrine()->getManager();
            //carga de los proyectos
            $personalRepository = $em->getRepository('GestionBundle:Proyectos');
            $personal = $personalRepository->getPersonal($item);
    }

    /**
     * @Route("/success")
     */
    public function successAction()
    {
        return $this->render('GestionBundle:Default:succescv.html.twig');
    }








}
