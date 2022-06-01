<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use App\Book;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Cartalyst\Stripe\Exception\CardErrorException;
use App\Book_Sell;
use App\Sell;
use App\Tipoenvio;
use App\Promotion;
use Illuminate\Support\Carbon;
use App\Mail\SendMailable;
use Illuminate\Support\Facades\Mail;
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
        $datos = session('datos');
        //dd($datos);
        $books = Book::all();
        return view('publicitaria.checkout', ['datos' => $datos, 'books' => $books]);
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
        try {
            $contents = [];
            $quantity = 0;
            foreach (session('cart') as $id => $details) {
                $libro = Book::findOrFail($id);
                if ($details['cantidadFisico'] > 0) {
                    $nombre = $libro->titulo . '(Fisico)';
                    $contents[$nombre] = $details['cantidadFisico'];
                }
                if ($details['cantidadDigital'] > 0) {
                    $nombre = $libro->titulo . '(Digital)';
                    $contents[$nombre] = $details['cantidadDigital'];
                }
                $quantity++;
            }
            $content = json_encode($contents);


            $totalStripe = (float)$request->subtotal + (float)$request->total;

            $charge = Stripe::charges()->create([
                'amount' => $totalStripe,
                'currency' => 'MXN',
                'source' => $request->stripeToken,
                'description' => 'Compra en elbooke.com',
                'receipt_email' => $request->email,
                'metadata' => [
                    'contents' => $content,
                    'quantity' => $quantity,
                ],
            ]);

            //SUCCESSFUL

            if ($request->numCasa != null) {
                $request->numCasa = ' int ' . $request->numCasa;
            }
            $sell = new Sell();
            $mytime = Carbon::now();
            $sell->status = 'completado';
            $sell->nombreCliente = trim($request->fname) . " " . trim($request->lname);
            $sell->edad = $request->age;
            $sell->pais = $request->country;
            $sell->genero = $request->genero;
            $sell->ciudad = $request->ciudad;
            $sell->estado = $request->state;
            $sell->correo = $request->email;
            $sell->formaPago = "3";
            $sell->comprobantePago = "1";
            $sell->telefono = $request->tel;
            $sell->direccion = $request->calle . " " . $request->numCasa . " " . $request->colonia;
            $sell->fecha = $mytime->toDateString();
            $sell->direccion = $sell->direccion . ' Referencia: ' . $request->referencias;
            if ($request->cuponId != null && $request->descuento != null) {
                $sell->discount = $request->descuento;
                $sell->promotion_id = $request->cuponId;
            }
            $sell->save();



            foreach (session('cart') as $id => $details) {
                $libro = Book::findOrFail($id);
                if ($details['cantidadFisico'] > 0) {
                    $compra = new Book_Sell();
                    $compra->book_id = $libro->id;
                    $compra->sell_id = $sell->id;
                    $compra->precio = number_format(($libro->precioFisico - $libro->precioFisico * ($libro->descuentoFisico / 100)) * $details['cantidadFisico'], 2, ".", "");
                    $compra->digital = "0";
                    $compra->cantidad = $details['cantidadFisico'];
                    $compra->save();
                    $libro->stockFisico = $libro->stockFisico - $details['cantidadFisico'];
                    $libro->save();
                }
                if ($details['cantidadDigital'] > 0) {
                    $compra = new Book_Sell();
                    $compra->book_id = $libro->id;
                    $compra->sell_id = $sell->id;
                    $compra->precio = number_format(($libro->precioDigital - $libro->precioDigital * ($libro->descuentoDigital / 100)), 2, ".", "");
                    $compra->digital = "1";
                    $compra->cantidad = $details['cantidadDigital'];
                    $compra->save();
                }
            }

            Mail::to($sell->correo)->send(new SendMailable($sell->id));
            session()->forget('cart');
            session()->forget('datos');
            $status = "Gracias por tu compra!. Se te enviará un correo electrónico con los detalles de tu pedido.";
            return redirect()->route('inicio')->with(compact('status'));
        } catch (CardErrorException $e) {
            //throw $th;
            if ($e->getMessage() == 'Your card has insufficient funds.') {
                $status = 'Error! Tu tarjeta no tiene fondos suficientes.';
            } else if ($e->getMessage() == 'Your card was declined.') {
                $status = 'Error! Tu tarjeta fue declinada.';
            } else if ($e->getMessage() == 'Your card has expired.') {
                $status = 'Error! Tu tarjeta ha expirado.';
            } else if ($e->getMessage() == "Your card's security code is incorrect.") {
                $status = 'Error! El código de seguridad de tu tarjeta es incorrecto.';
            } else if ($e->getMessage() == "An error occurred while processing your card. Try again in a little bit.") {
                $status = 'Error! Un problema ocurrió mientras procesabamos tu tarjeta. Inténtalo de nuevo más tarde.';
            } else {
                $status = 'Error! ' . $e->getMessage();
            }
            return redirect()->route('compra')->with(compact('status'));
        }
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