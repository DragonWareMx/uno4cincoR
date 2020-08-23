<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Sell;
use App\Book_Sell;
use App\Book;
use App\Promotion;

class SendMailableTransfer extends Mailable
{
    use Queueable, SerializesModels;
    private $idVenta;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($idVenta)
    {
        $this->idVenta=$idVenta;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $sell=Sell::findOrFail($this->idVenta);
        $librosVendidos=Book_Sell::where('sell_id',$sell->id)->get();
        $libros=Book::get();
        $cupones=Promotion::get();
        return $this->subject('Estás a 2 pasos de completar tu compra en uno4cinco!')
        ->view('emails.transferemail',['sell'=>$sell,'librosVendidos'=>$librosVendidos,'libros'=>$libros,'cupones'=>$cupones]);
    }
}
