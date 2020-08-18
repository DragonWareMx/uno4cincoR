<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use App\Book;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Cartalyst\Stripe\Exception\CardErrorException;

use function GuzzleHttp\Promise\all;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos=session('datos');
        $books = Book::all();
        //session()->forget('datos');
        return view('publicitaria.checkout',['datos'=>$datos,'books'=>$books]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        
            $charge = Stripe::charges()->create([
                'amount'=> $request->total,
                'currency'=> 'MXN',
                'source' => $request->stripeToken,
                'description'=>'Compra en uno4cinco.com',
                'receipt_email'=> $request->email,
                'metadata' => [
                    //'contents'=>contents,
                    //'quantity'=>quantity,
                ],
            ]);

            //SUCCESSFUL
            $status="Gracias por su compra!. Se te enviará un correo electrónico con los detalles de tu pedido.";
            return redirect()->route('tiendaCatalogo')->with(compact('status'));
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
