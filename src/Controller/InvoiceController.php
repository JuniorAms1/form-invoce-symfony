<?php

namespace App\Controller;

use App\Entity\Invoice;
use App\Form\InvoiceType;
use App\Entity\InvoiceLines;
use App\Form\InvoiceLinesType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class InvoiceController extends AbstractController
{
   
    
    #[Route('/', name: 'app_invoice')]
    public function createInvoice(Request $request,
    ManagerRegistry $doctrine): Response
    {
        $notification = null;
        #For Invoice entity
        $invoice = new Invoice();
        
        $form_invoice = $this->createForm(InvoiceType::class, $invoice);
      

        $form_invoice->handleRequest($request);
        if ($form_invoice->isSubmitted() && $form_invoice->isValid()) {
           
             # Save data of Invoice Entity in database
          $em = $doctrine->getManager();
          $em ->persist($invoice);
          $em ->flush();
          $notification = "Facture créer avec succées.";
          return $this->redirectToRoute('app_invoice_lines');
               
    
         
        }
        return $this->render('invoice/createInvoice.html.twig', [
            'form_invoice' => $form_invoice->createView(),
            'notification' => $notification
        ]
        
    );
    }

    #[Route('/invoicelines', name: 'app_invoice_lines')]
    public function createInvoiceLines(Request $request,
    ManagerRegistry $doctrine): Response
    {
        $notification = null;
       
        #For InvoiceLines entity
        $invoiceLines = new InvoiceLines();
        
        $form_invoiceLines = $this->createForm(InvoiceLinesType::class, $invoiceLines);

      
          
                #Update invoiceLines
                $form_invoiceLines->handleRequest($request);
                if ($form_invoiceLines->isSubmitted() && $form_invoiceLines->isValid()) {
                    
                    # Save data of InvoiceLines Entity in database
                    $em = $doctrine->getManager();
                    $em ->persist($invoiceLines);
                    $em ->flush();
                    $notification = "Ligne de la facture créer avec succées.";
                }
       
        return $this->render('invoice/createInvoiceliste.html.twig', [
           
            'form_invoice_lines' => $form_invoiceLines->createView(),
            'notification' => $notification
        ]
        
    );
    }
}
