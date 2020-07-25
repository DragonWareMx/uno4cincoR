<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Config;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Payer;
use PayPal\Api\Amount;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Exception\PayPalConnectionException;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use App\Book;


class PaymentController extends Controller
{
    //
    private $apiContext;

    public function __construct()
    {
        $payPalConfig=Config::get('paypal');
        $this->apiContext = new ApiContext(
            new OAuthTokenCredential(
                $payPalConfig['client_id'],     // ClientID
                $payPalConfig['secret']      // ClientSecret
            )
        );
    }

    public function payWithPayPal(Request $request){
        // After Step 2
        
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        //Parte para sacar los items del carrito y meterlos a paypal
        $books=Book::get();
        $contador=0;
        $items=[];
        foreach (session('cart') as $id => $details) {
            foreach ($books as $libro) {
                if ($libro->id == $id) {
                    if ($details['cantidadFisico'] > 0) {
                        $items[$contador] = new Item();
                        $items[$contador]->setName($libro->titulo.' (Físico)') /** item name **/
                                    ->setCurrency('MXN')
                                    ->setQuantity($details['cantidadFisico'])
                                    ->setPrice( number_format(($libro->precioFisico - $libro->precioFisico*($libro->descuentoFisico/100))*$details['cantidadFisico'], 2 , ".", "," ) ); 
                        $contador++;
                    }
                    if ($details['cantidadDigital'] > 0) {
                        $items[$contador] = new Item();
                        $items[$contador]->setName($libro->titulo.' (Digital)') /** item name **/
                                    ->setCurrency('MXN')
                                    ->setQuantity($details['cantidadDigital'])
                                    ->setPrice(number_format(($libro->precioDigital - $libro->precioDigital*($libro->descuentoDigital/100)), 2 , ".", "," )); 
                    }
                }
            }
            $contador++;
        }
        $item_list = new ItemList();
        $item_list->setItems($items);
        

        $amount = new Amount();
        $amount->setTotal($request->total);
        $amount->setCurrency('MXN');

        $transaction = new Transaction();
        $transaction->setAmount($amount);
        $transaction->setDescription('Compra en uno4cinco.com');
        $transaction->setItemList($item_list);

        $callbackurl=route('statusPayPal');
        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl($callbackurl)
            ->setCancelUrl($callbackurl);

        $payment = new Payment();
        $payment->setIntent('sale')
            ->setPayer($payer)
            ->setTransactions(array($transaction))
            ->setRedirectUrls($redirectUrls);

        try {
            $payment->create($this->apiContext);
            //echo $payment;
            return redirect()->away($payment->getApprovalLink());
        }
        catch (PayPalConnectionException $ex) {
            
            echo $ex->getData();
        }
    }

    public function payPalStatus(Request $request){
        $paymentId=$request->input('paymentId');
        $payerId=$request->input('PayerID');
        $token=$request->input('token');

        if(!$paymentId || !$payerId || !$token){
            $status="No se pudo proceder con el pago através de PayPal.";
            return redirect()->route('compra')->with(compact('status'));
        }
        $payment= Payment::get($paymentId,$this->apiContext);

        $execution=new PaymentExecution();
        $execution->setPayerId($payerId);

        $result= $payment->execute($execution,$this->apiContext);

        if($result->getState()=='approved'){
            session()->forget('cart');
            $status="Gracias! El pago a través de PayPal se ha procesado correctamente.";
            return redirect()->route('tiendaCatalogo')->with(compact('status'));
        }
            $status="Lo sentimos! El pago a través de PayPal no se pudo realizar.";
            return redirect()->route('carrito')->with(compact('status'));
    }
}
