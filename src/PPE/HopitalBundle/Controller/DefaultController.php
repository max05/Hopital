<?php
namespace PPE\HopitalBundle\Controller;
    use Symfony\Bundle\FrameworkBundle\Controller\Controller;
    use PPE\HopitalBundle\form\SecretaireType;
    use PPE\HopitalBundle\Entity\Secretaire;
    use PPE\HopitalBundle\Entity\Patient;
    use PPE\HopitalBundle\form\PatientType;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\Response;

    class DefaultController extends Controller
    {
        public function indexAction($name)
        {
            return $this->render('PPEHopitalBundle:Default:index.html.twig', array('name' => $name));
        }
        public function accueilAction()
        {
            return $this->render('PPEHopitalBundle:Default:accueil.html.twig');
        }
        public function medecinAction()
        {
            return $this->render('PPEHopitalBundle:Default:medecin.html.twig');
        }
        public function DemandeRDVAction()
        {
            return $this->render('PPEHopitalBundle:Default:DemandeRDV.html.twig');
        }
        public function specialiterAction()
        {
            return $this->render('PPEHopitalBundle:Default:specialiter.html.twig');
        }
        public function ListAction()
        {
            return $this->render('PPEHopitalBundle:Default:List.html.twig');
        }
        public function identificationPatientAction(Request $request)
        {
            $unPatient=new Patient();
            $formBuilder=$this->createFormBuilder($unPatient);
            $formBuilder->findby('nom');
            $formBuilder->findby('mdp');
            $form=$formBuilder->getForm();
            if ($request->getMethod()=='POST')
            {
                $form->bind($request);
                if ($form->isValid())
                {
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($unPatient);
                    $em->flush();
                }
            }



            return $this->render('PPEHopitalBundle:Default:identificationPatient.html.twig');
        }
        public function identificationSecretaireAction()
        {
            return $this->render('PPEHopitalBundle:Default:identificationSecretaire.html.twig');
        }

        public function loginAction()
        {
            return $this->render('PPEHopitalBundle:Default:login.html.twig');
        }
        public function secrtetaireAction()
        {
            $doctrine=$this->getDoctrine();
            $entityManager=$doctrine->getManager();
            $repository=$entityManager->getRepository('PPEHopitalBundle:Secretaire');
            $lesSecretaire=$repository->findAll();


            return $this->render('PPEHopitalBundle:Default:secretaire.html.twig',array('secretaires'=>$lesSecretaire));
        }
    
    public function modifSecretaireAction(Request $request)
    {
        $id=$request->query->get('id');
        $id=1;
        $doctrine=$this->getDoctrine();
        $entityManager=$doctrine->getManager();
        $repository=$entityManager->getRepository('PPEHopitalBundle:Secretaire');
        $unSecretaire=$repository->find($id);
        $form=$this->createForm(new SecretaireType(),$unSecretaire);
        if ($request->getMethod()=='POST')
        {
            $form->bind($request);
            if ($form->isValid()) {

                $doctrine=$this->getDoctrine();
                $entityManager=$doctrine->getManager();
                $entityManager->persist($unSecretaire);
                $entityManager->flush();
            }

        }


        return $this->render('PPEHopitalBundle:Default:modifSecretaire.html.twig',array('form'=>$form->createView()));
    }
}