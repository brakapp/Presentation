<?php

namespace GestionBundle\Controller;


use GestionBundle\Entity\Contacto;
use GestionBundle\Entity\Pqrs;
use GestionBundle\Entity\Postventa;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use GestionBundle\Form\CurriculumsType;
use GestionBundle\Form\ProveedoresType;
use GestionBundle\Form\ContactoType;
use GestionBundle\Form\PqrsType;
use GestionBundle\Form\PostventaType;
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

            return $this->render('GestionBundle:Default:succescv.html.twig', array('mensaje'=>'Hemos recibido tu hoja de vida, nos comunicaremos contigo'));
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
             //mail("asesora.ventas@orbesa.com.co , duviel7@gmail.com", "Contactar top","Top mensaje de la aplicación");
            //recoleccion de datos de la entidad
            $nombre = $contacto->getNombre();
            $email = $contacto->getEmail();
            $telefono = $contacto->getTelefono();
            $mensaje = $contacto->getMensaje();
            $dpto = $contacto->getDpto()->getNombre();
            $proyecto = $contacto->getProyecto()->getNombre();
            $mensage = "<strong>Nombre:</strong> $nombre <br/> <strong>Email:</strong> $email <br/> <strong>Telefono:</strong> $telefono <br/><strong> Departamento:</strong> $dpto <br/> <strong>Proyecto:</strong> $proyecto <br/><strong> mensaje:</strong> <br/> $mensaje";
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
            
            $dat = "";
             foreach ($personal as $key => $value) {
                $dat .= $value['email'];
                $dat .= ", ";
            }
            
            #quitamos la coma dle final de la cadena que almacena todos los correos
            $m = strlen($dat);
            $dat = substr($dat,0,$m-1);
            //$dat .=", mercadeo@orbesa.com.co";
            $dat = "";
            $headers = "Content-Type: text/html; charset=UTF-8";
            
            mail("asesora.ventas@orbesa.com.co , mercadeo@orbesa.com.co", "Contactar","$mensage",$headers, "-f contactar@orbeadmin.com");
            
            $nombre = ucwords($nombre);
            return $this->render('GestionBundle:Default:succescv.html.twig', array('mensaje'=>'Su mensaje ha sido recibido, muchas gracias por contactarnos '.$nombre));
            // Formulario enviado
            //die;
        }
        return $this->render('GestionBundle:Default:contactar.html.twig', array(
            'form' => $form->createView()
        ));
    }


    /**
     * @Route("/home/pqrs", name="home_pqrs")
     */
    public function pqrsAction(Request $request)
    {
        
        $session = new Session();
        $pqrs = new Pqrs();
        $form = $this->createForm(new PqrsType(), $pqrs);

        $form->handleRequest($request);


        if ($form->isValid()) {
            
            //recoleccion de datos de la entidad
            $tipo = $pqrs->getTipo();
            $nombre = $pqrs->getNombres();
            $apellidos = $pqrs->getApellidos();
            $tipodocumento = $this->tipodoc($pqrs->getTdocumento());
            $documento = $pqrs->getDocumento();

            
            $celular = $pqrs->getCelular();
            $telefono = $pqrs->getTelefonof();
            $email = $pqrs->getEmail();
            $proyecto = $pqrs->getProyecto()->getNombre();
            $mensaje = $pqrs->getTexto();
            
            #envio del correo al encargado del departamento seleccionado
            $messageObject ="Tipo de Documento:".$this->tipodoc($tipodocumento)."<br>"
                ."Número Documento: ".$documento."\n"
                ."Nombre: ".$nombre." ".$apellidos."\n"
                ."Email: ".$email."\n"
                ."Celular: ".$celular."\n"
                ."Telefono: ".$telefono."\n"
                ."Proyecto: ".$proyecto."\n"
                ."mensaje: \n".$mensaje;             
             
            mail('mercadeo@orbesa.com.co', 'PQRS $proyecto'.$proyecto, $messageObject);
            
            

            //recoleccion de los correos del departamento seleccionado
            $em = $this->getDoctrine()->getManager();
            $em->persist($pqrs);
            $em->flush();

           
            
            //return new JsonResponse($dat);
            $nombre = ucwords($nombre);
            return $this->render('GestionBundle:Default:succescv.html.twig', array('mensaje'=>'Su mensaje ha sido recibido, muchas gracias por contactarnos '.$nombre));
            // Formulario enviado
            //die;
        }
        return $this->render('GestionBundle:Default:pqrs.html.twig', array(
            'form' => $form->createView()
        ));
    }

    /**
     * @Route("/home/postventa", name="home_postventa")
     */
    public function postventaAction(Request $request)
    {
        $session = new Session();
        $postventa = new Postventa();
        $form = $this->createForm(new PostventaType(), $postventa);

        $form->handleRequest($request);


        if ($form->isValid()) {
            $proyecto = $postventa->getProyecto()->getNombre();
            $tipoInmueble = $this->tipoiml($postventa->getTipoInmueble());
            $unidad = $postventa->getUnidad();
            $torreBloque = $postventa->getTorreBloque();
            $apartamento = $postventa->getApartamento();
            $fechaEntrega = $postventa->getFechaentrega();
            $tipoDoc = $this->tipodoc($postventa->getTipodocumento());
            $numerodoc = $postventa->getNumerodocumento();
            $nombrepropietario = $postventa->getNombrepropietario();
            $nombresol = $postventa->getNombreapellidosol();
            $tipodocsol = $this->tipodoc($postventa->getTipodocumentosol());
            $numerodocsol = $postventa->getNumerodocumentosol();
            $celular = $postventa->getCelular();
            $fijo = $postventa->getFijo();
            $email = $postventa->getEmail();
            $tipocli = $this->tipocli($postventa->getTipocliente());
            $arreglo = $postventa->getSolicitudarreglo();

            if($postventa->getTipoInmueble() == 1)
            {
                $cuerpo = 
                "Proyecto: ".$proyecto."\n"
                ."Tipo de Inmueble: ".$tipoInmueble."\n"
                ."Unidad: ".$unidad."\n"
                ."Fecha de Entrega: ".$fechaEntrega."\n"
                ."Tipo de Documento: ".$tipoDoc."\n"
                ."Documento: ".$numerodoc."\n"
                ."Nombre Propietario: ".$nombrepropietario."\n"
                ."Tipo de cliente: ".$tipocli."\n"
                ."Nombre Solicitante: ".$nombresol."\n"
                ."Tipo de documento del Solicitante: ".$tipodocsol."\n"
                ."Documento Solicitante: ".$numerodocsol."\n"
                ."Celular: ".$celular."\n"
                ."Fijo: ".$fijo."\n"
                ."Email: ".$email."\n"
                ."Solicitud de Arreglo: \n".$arreglo;   
                
                mail('mercadeo@orbesa.com.co', 'Solicitud de Arreglo', $cuerpo); 
            }else
            {
                $cuerpo = 
                "Proyecto: ".$proyecto."\n"
                ."Tipo de Inmueble: ".$tipoInmueble."\n"
                ."Torre o bloque: ".$torreBloque."\n"
                ."Apartamento: ".$apartamento."\n"
                ."Fecha de Entrega: ".$fechaEntrega."\n"
                ."Tipo de Documento: ".$tipoDoc."\n"
                ."Documento: ".$numerodoc."\n"
                ."Nombre Propietario: ".$nombrepropietario."\n"
                ."Tipo de cliente: ".$tipocli."\n"
                ."Nombre Solicitante: ".$nombresol."\n"
                ."Tipo de documento del Solicitante: ".$tipodocsol."\n"
                ."Documento Solicitante: ".$numerodocsol."\n"
                ."Celular: ".$celular."\n"
                ."Fijo: ".$fijo."\n"
                ."Email: ".$email."\n"
                ."Solicitud de Arreglo: \n".$arreglo;   
                
                mail('mercadeo@orbesa.com.co', 'Solicitud de Arreglo', $cuerpo);
            }
            $em = $this->getDoctrine()->getManager();
            $em->persist($postventa);
            $em->flush();

            return $this->render('GestionBundle:Default:succescv.html.twig', array('mensaje'=>'Su mensaje ha sido recibido, muchas gracias por contactarnos'));
        }

        return $this->render('GestionBundle:Default:postventa.html.twig', array(
            'form' => $form->createView()
        ));
    }

    /**
     * @Route("/home/proyecto/{item}", name="home_proyectos")
     */
    public function proyectosAction($item)
    {
        try {
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
            

            
        } catch (Exception $e) {
            
        }
        
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
       return $this->render('GestionBundle:Default:'.$page.'.html.twig'); 
       /*if($page == 'index' || $page == 'construccion' || $page == 'galeria' || $page == 'mision' || $page == 'vision' | $page == 'contactar' || $page == 'valores' || $page == 'succescv' || $page == 'proveedor' || $page == 'proyecto' || $page == 'proyectos' || $page == 'faqs' || $page == 'nuestraempresa')
        {
            return $this->render('GestionBundle:Default:'.$page.'.html.twig');    
        }   
        else
        {
            return $this->render('GestionBundle:Default:404.html.twig'); 
            
        }*/
    }
    
     /**
     * @Route("/", name="home_pages")
     */
    
    public function staticsPagesAction()
    {
       return $this->render('GestionBundle:Default:home.html.twig'); 
       
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

    


    //definicio del tipo de documento
    public function tipodoc($data)
    {
        if($data == 1)
        {
            return "Cedula de Ciudadania";
        }elseif($data == 2)
        {
            return "Cedula de extranjeria";
        }else
        {
            return "NIT";
        }
    }

    //deifinicion del tipo de lciente
    public function tipocli($data)
    {
        if($data == 1)
        {
            return 'Arrendatario';
        }elseif($data == 2)
        {
            return 'Propietario';
        }elseif($data == 3)
        {
            return 'Inmobiliaria';
        }
        else
        {
            return 'Apoderado';
        }
    }
    //funcion para establecer el tipo de inmueble
    public function tipoiml($data)
    {
        if($data == 1)
        {
            return "Casa";
        }
        elseif($data == 2)
        {
            return "Apartamento";
        }
    }







}







