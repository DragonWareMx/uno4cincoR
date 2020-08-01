<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
use App\Sell;
use App\Book_Sell;
use App\Mail\SendMailable;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;


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
        $data=request()->validate([
            'fname'=>'required|max:200',
            'lname'=>'required|max:200',
            'email'=>'required|email',
            'age'=>'required|numeric|min:5',
            'genero'=>'required',
            'tel'=>'required|numeric',
            'country'=>'required',
            'state'=>'required',
            'ciudad'=>'required',
            'colonia'=>'required',
            'calle'=>'required',
            'numCasa'=>'nullable|numeric',
            'cp'=>'required|numeric',
        ]);
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
                        $items[$contador]->setName($libro->titulo.' (Físico - Preventa)') /** item name **/
                                    ->setCurrency('MXN')
                                    ->setQuantity($details['cantidadFisico'])
                                    ->setPrice( number_format(($libro->precioFisico - $libro->precioFisico*($libro->descuentoFisico/100))*$details['cantidadFisico'], 2 , ".", "," ) ); 
                        $contador++;
                    }
                    if ($details['cantidadDigital'] > 0) {
                        $items[$contador] = new Item();
                        $items[$contador]->setName($libro->titulo.' (Digital - Preventa)') /** item name **/
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
        
        //VARIABLES DE SESION
        Session::put('email', $request->email);
        Session::put('age', $request->age);
        Session::put('genero', $request->genero);
        Session::put('telefono', $request->tel);
        //lista de paises
        $country=[["AF","Afghanistan"],["AL","Albania"],["DZ","Algeria"],["DS","American Samoa"],["AD","Andorra"],["AO","Angola"],["AI","Anguilla"],["AQ","Antarctica"],["AG","Antigua and Barbuda"],["AR","Argentina"],["AM","Armenia"],["AW","Aruba"],["AU","Australia"],["AT","Austria"],["AZ","Azerbaijan"],["BS","Bahamas"],["BH","Bahrain"],["BD","Bangladesh"],["BB","Barbados"],["BY","Belarus"],["BE","Belgium"],["BZ","Belize"],["BJ","Benin"],["BM","Bermuda"],["BT","Bhutan"],["BO","Bolivia"],["BA","Bosnia and Herzegovina"],["BW","Botswana"],["BV","Bouvet Island"],["BR","Brazil"],["IO","British Indian Ocean Territory"],["BN","Brunei Darussalam"],["BG","Bulgaria"],["BF","Burkina Faso"],["BI","Burundi"],["KH","Cambodia"],["CM","Cameroon"],["CA","Canada"],["CV","Cape Verde"],["KY","Cayman Islands"],["CF","Central African Republic"],["TD","Chad"],["CL","Chile"],["CN","China"],["CX","Christmas Island"],["CC","Cocos (Keeling) Islands"],["CO","Colombia"],["KM","Comoros"],["CG","Congo"],["CK","Cook Islands"],["CR","Costa Rica"],["HR","Croatia (Hrvatska)"],["CU","Cuba"],["CY","Cyprus"],["CZ","Czech Republic"],["DK","Denmark"],["DJ","Djibouti"],["DM","Dominica"],["DO","Dominican Republic"],["TP","East Timor"],["EC","Ecuador"],["EG","Egypt"],["SV","El Salvador"],["GQ","Equatorial Guinea"],["ER","Eritrea"],["EE","Estonia"],["ET","Ethiopia"],["FK","Falkland Islands (Malvinas)"],["FO","Faroe Islands"],["FJ","Fiji"],["FI","Finland"],["FR","France"],["FX","France, Metropolitan"],["GF","French Guiana"],["PF","French Polynesia"],["TF","French Southern Territories"],["GA","Gabon"],["GM","Gambia"],["GE","Georgia"],["DE","Germany"],["GH","Ghana"],["GI","Gibraltar"],["GK","Guernsey"],["GR","Greece"],["GL","Greenland"],["GD","Grenada"],["GP","Guadeloupe"],["GU","Guam"],["GT","Guatemala"],["GN","Guinea"],["GW","Guinea-Bissau"],["GY","Guyana"],["HT","Haiti"],["HM","Heard and Mc Donald Islands"],["HN","Honduras"],["HK","Hong Kong"],["HU","Hungary"],["IS","Iceland"],["IN","India"],["IM","Isle of Man"],["ID","Indonesia"],["IR","Iran"],["IQ","Iraq"],["IE","Ireland"],["IL","Israel"],["IT","Italy"],["CI","Ivory Coast"],["JE","Jersey"],["JM","Jamaica"],["JP","Japan"],["JO","Jordan"],["KZ","Kazakhstan"],["KE","Kenya"],["KI","Kiribati"],["KP","North Korea"],["KR","South Korea"],["XK","Kosovo"],["KW","Kuwait"],["KG","Kyrgyzstan"],["LA","Lao"],["LV","Latvia"],["LB","Lebanon"],["LS","Lesotho"],["LR","Liberia"],["LY","Libyan Arab Jamahiriya"],["LI","Liechtenstein"],["LT","Lithuania"],["LU","Luxembourg"],["MO","Macau"],["MK","Macedonia"],["MG","Madagascar"],["MW","Malawi"],["MY","Malaysia"],["MV","Maldives"],["ML","Mali"],["MT","Malta"],["MH","Marshall Islands"],["MQ","Martinique"],["MR","Mauritania"],["MU","Mauritius"],["TY","Mayotte"],["MX","Mexico"],["FM","Micronesia, Federated States of"],["MD","Moldova, Republic of"],["MC","Monaco"],["MN","Mongolia"],["ME","Montenegro"],["MS","Montserrat"],["MA","Morocco"],["MZ","Mozambique"],["MM","Myanmar"],["NA","Namibia"],["NR","Nauru"],["NP","Nepal"],["NL","Netherlands"],["AN","Netherlands Antilles"],["NC","New Caledonia"],["NZ","New Zealand"],["NI","Nicaragua"],["NE","Niger"],["NG","Nigeria"],["NU","Niue"],["NF","Norfolk Island"],["MP","Northern Mariana Islands"],["NO","Norway"],["OM","Oman"],["PK","Pakistan"],["PW","Palau"],["PS","Palestine"],["PA","Panama"],["PG","Papua New Guinea"],["PY","Paraguay"],["PE","Peru"],["PH","Philippines"],["PN","Pitcairn"],["PL","Poland"],["PT","Portugal"],["PR","Puerto Rico"],["QA","Qatar"],["RE","Reunion"],["RO","Romania"],["RU","Russian Federation"],["RW","Rwanda"],["KN","Saint Kitts and Nevis"],["LC","Saint Lucia"],["VC","Saint Vincent and the Grenadines"],["WS","Samoa"],["SM","San Marino"],["ST","Sao Tome and Principe"],["SA","Saudi Arabia"],["SN","Senegal"],["RS","Serbia"],["SC","Seychelles"],["SL","Sierra Leone"],["SG","Singapore"],["SK","Slovakia"],["SI","Slovenia"],["SB","Solomon Islands"],["SO","Somalia"],["ZA","South Africa"],["GS","South Georgia South Sandwich Islands"],["ES","Spain"],["LK","Sri Lanka"],["SH","St. Helena"],["PM","St. Pierre and Miquelon"],["SD","Sudan"],["SR","Suriname"],["SJ","Svalbard and Jan Mayen Islands"],["SZ","Swaziland"],["SE","Sweden"],["CH","Switzerland"],["SY","Syrian Arab Republic"],["TW","Taiwan"],["TJ","Tajikistan"],["TZ","Tanzania"],["TH","Thailand"],["TG","Togo"],["TK","Tokelau"],["TO","Tonga"],["TT","Trinidad and Tobago"],["TN","Tunisia"],["TR","Turkey"],["TM","Turkmenistan"],["TC","Turks and Caicos Islands"],["TV","Tuvalu"],["UG","Uganda"],["UA","Ukraine"],["AE","United Arab Emirates"],["GB","United Kingdom"],["US","United States"],["UM","United States minor outlying islands"],["UY","Uruguay"],["UZ","Uzbekistan"],["VU","Vanuatu"],["VA","Vatican City State"],["VE","Venezuela"],["VN","Vietnam"],["VG","Virgin Islands (British)"],["VI","Virgin Islands (U.S.)"],["WF","Wallis and Futuna Islands"],["EH","Western Sahara"],["YE","Yemen"],["ZR","Zaire"],["ZM","Zambia"],["ZW","Zimbabwe"]];
        $country_code="";
        foreach ($country as $pais) {
            if ($pais[1]==$request->country) {
                $country_code=$pais[0];
            }
        }
        $shippingAddress = [
            "recipient_name" => $request->fname." ".$request->lname,
            "line1" => $request->calle." ".$request->numCasa, 
            "line2" => $request->colonia,
            "city" => $request->ciudad,
            "country_code" => $country_code,
            "postal_code" => $request->cp,
            "state" => $request->state,
            "phone" => $request->tel
        ];
        $item_list->setShippingAddress($shippingAddress);

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
            //se registra la venta en la BD en la tabla Sell
            $sell=new Sell();
            $mytime = Carbon::now();
            $sell->status='completado';
            $sell->nombreCliente=$result->getPayer()->getPayerInfo()->getShippingAddress()->getRecipientName();
            $sell->edad=Session::get('age');
            $sell->pais=$result->getPayer()->getPayerInfo()->getShippingAddress()->getCountryCode();
            $sell->genero=Session::get('genero');                                               
            $sell->ciudad=$result->getPayer()->getPayerInfo()->getShippingAddress()->city;
            $sell->estado=$result->getPayer()->getPayerInfo()->getShippingAddress()->getState();
            $sell->correo=Session::get('email');
            $sell->formaPago="1";
            $sell->comprobantePago="1";
            $sell->telefono=Session::get('telefono');
            $sell->direccion=$result->getPayer()->getPayerInfo()->getShippingAddress()->getLine1()." ".
            $result->getPayer()->getPayerInfo()->getShippingAddress()->getLine2();
            $sell->fecha=$mytime->toDateString();    
            $sell->save();

            foreach (session('cart') as $id => $details) {
                $libro=Book::findOrFail($id);
                if ($details['cantidadFisico'] > 0) {
                    $compra=new Book_Sell();
                    $compra->book_id=$libro->id;
                    $compra->sell_id=$sell->id;
                    $compra->precio=number_format(($libro->precioFisico - $libro->precioFisico*($libro->descuentoFisico/100))*$details['cantidadFisico'], 2 , ".", "," );
                    $compra->digital="0";
                    $compra->cantidad=$details['cantidadFisico'];
                    $compra->save();
                }
                if ($details['cantidadDigital'] > 0) {
                    $compra=new Book_Sell();
                    $compra->book_id=$libro->id;
                    $compra->sell_id=$sell->id;
                    $compra->precio=number_format(($libro->precioDigital - $libro->precioDigital*($libro->descuentoDigital/100)), 2 , ".", "," );
                    $compra->digital="1";
                    $compra->cantidad=$details['cantidadDigital'];
                    $compra->save();
                }
            }
            //aqui acaba lo de registrar la venta en la bd
            Mail::to($sell->correo)->send(new SendMailable($sell->id));
            session()->forget('cart');
            $status="Gracias! El pago a través de PayPal se ha procesado correctamente.";
            return redirect()->route('tiendaCatalogo')->with(compact('status'));
        }
            $status="Lo sentimos! El pago a través de PayPal no se pudo realizar.";
            return redirect()->route('carrito')->with(compact('status'));
    }
}
