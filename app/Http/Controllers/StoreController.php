<?php

namespace App\Http\Controllers;

use App\Store;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Session as FlashingSession;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    protected $goods = array(
        # id, good, price
        0 => [2, "Kohv", 3],
        1 => [65, "Banaan", 1],
        2 => [44, "Viin", 7],
        3 => [32, "Tsement", 4],
        4 => [46, "Nartsiss", 0.5],
        5 => [5, "iPad", 1000],
        6 => [76, "Tee", 2],
        7 => [67, "Kohver", 400],
        8 => [9, "Auto", 10000]
    );

    public function index()
    {
        $items = $this->goods;
        return view('store') ->withItems($items);
    }

    public function addtocart(Request $cart)
    {
        session()-> push('cart', array ($cart->id, $cart->amount) );
       
        return back()->withInput();
    }

    public function discardCart()
    {
        if (session()->has('cart')) {
            session()->forget('cart');
        }

        return redirect('store');
    }

    public function cart() {
        # has cart?
        # TODO refactor this part into function
        if (session()->has('cart')) {
            $cart = session()->get('cart');
        } else {
            FlashingSession::flash('message', 'Ostukorv on tühi!');
            FlashingSession::flash('alert-class', 'alert-danger');
            return back();
        }

        # get prices from $goods and calculate cart price
        # (don't trust price from frontend!)
        $warehouse = $this -> goods; 
        $sum = 0;
        foreach ($cart as $item) {
            foreach ($warehouse as $good) {
                if ($item[0] == $good[0]) {
                    $rowPrice = $good[2]*$item[1];
                    $good[3] = intval($item[1]);
                    $good[4] = $rowPrice;
                    $items[] = $good;
                    $sum+=$rowPrice;
                }
            }
        }

        return view('cart')->withItems($items)->withSum($sum);
    }

    public function pay(){
    # Most of it comes from using https://github.com/BitWeb/Pangalink.net
    
    // THIS IS AUTO GENERATED SCRIPT
    // (c) 2011-2020 Kreata OÜ www.pangalink.net

    // File encoding: UTF-8
    // Check that your editor is set to use UTF-8 before using any non-ascii characters

    // STEP 1. Setup private key
    // =========================
    $private_key = openssl_pkey_get_private( file_get_contents('./user_key.pem') );
        
        // STEP 2. Define payment information
        // ==================================
        $cart = session()->get('cart');
        $warehouse = $this -> goods; 
        $amount = 0;
        foreach ($cart as $item) {
            foreach ($warehouse as $good) {
                if ($item[0] == $good[0]) {
                    $rowPrice = $good[2]*$item[1];
                    $good[4] = $rowPrice;
                    $amount+=$rowPrice;
                }
            }
        }
        $fields = array(
                "VK_SERVICE"     => "1011",
                "VK_VERSION"     => "008",
                "VK_SND_ID"      => "uid26",
                "VK_STAMP"       => "12345",
                "VK_AMOUNT"      => strval($amount),
                "VK_CURR"        => "EUR",
                "VK_ACC"         => "EE871600161234567892",
                "VK_NAME"        => "ÕIE MÄGER",
                "VK_REF"         => "1234561",
                "VK_LANG"        => "EST",
                "VK_MSG"         => "Torso Tiger",
                "VK_RETURN"      => "http://localhost/project/5ec176fcb469c4d1d549e6aa?payment_action=success",
                "VK_CANCEL"      => "http://localhost/project/5ec176fcb469c4d1d549e6aa?payment_action=cancel",
                "VK_DATETIME"    => date(DATE_ISO8601),
                "VK_ENCODING"    => "utf-8",
        );
        
        // STEP 3. Generate data to be signed
        // ==================================
        
        // Data to be signed is in the form of XXXYYYYY where XXX is 3 char
        // zero padded length of the value and YYY the value itself
        // NB! Ipizza Testpank expects symbol count, not byte count with UTF-8,
        // so use `mb_strlen` instead of `strlen` to detect the length of a string
        
        $data = str_pad (mb_strlen($fields["VK_SERVICE"], "UTF-8"), 3, "0", STR_PAD_LEFT) . $fields["VK_SERVICE"] .    /* 1011 */
                str_pad (mb_strlen($fields["VK_VERSION"], "UTF-8"), 3, "0", STR_PAD_LEFT) . $fields["VK_VERSION"] .    /* 008 */
                str_pad (mb_strlen($fields["VK_SND_ID"], "UTF-8"),  3, "0", STR_PAD_LEFT) . $fields["VK_SND_ID"] .     /* uid26 */
                str_pad (mb_strlen($fields["VK_STAMP"], "UTF-8"),   3, "0", STR_PAD_LEFT) . $fields["VK_STAMP"] .      /* 12345 */
                str_pad (mb_strlen($fields["VK_AMOUNT"], "UTF-8"),  3, "0", STR_PAD_LEFT) . $fields["VK_AMOUNT"] .     /* 150 */
                str_pad (mb_strlen($fields["VK_CURR"], "UTF-8"),    3, "0", STR_PAD_LEFT) . $fields["VK_CURR"] .       /* EUR */
                str_pad (mb_strlen($fields["VK_ACC"], "UTF-8"),     3, "0", STR_PAD_LEFT) . $fields["VK_ACC"] .        /* EE871600161234567892 */
                str_pad (mb_strlen($fields["VK_NAME"], "UTF-8"),    3, "0", STR_PAD_LEFT) . $fields["VK_NAME"] .       /* ÕIE MÄGER */
                str_pad (mb_strlen($fields["VK_REF"], "UTF-8"),     3, "0", STR_PAD_LEFT) . $fields["VK_REF"] .        /* 1234561 */
                str_pad (mb_strlen($fields["VK_MSG"], "UTF-8"),     3, "0", STR_PAD_LEFT) . $fields["VK_MSG"] .        /* Torso Tiger */
                str_pad (mb_strlen($fields["VK_RETURN"], "UTF-8"),  3, "0", STR_PAD_LEFT) . $fields["VK_RETURN"] .     /* http://localhost/project/5ec176fcb469c4d1d549e6aa?payment_action=success */
                str_pad (mb_strlen($fields["VK_CANCEL"], "UTF-8"),  3, "0", STR_PAD_LEFT) . $fields["VK_CANCEL"] .     /* http://localhost/project/5ec176fcb469c4d1d549e6aa?payment_action=cancel */
                str_pad (mb_strlen($fields["VK_DATETIME"], "UTF-8"), 3, "0", STR_PAD_LEFT) . $fields["VK_DATETIME"];    /* 2020-05-17T17:40:24+0000 */
        
        /* $data = "0041011003008005uid2600512345003150003EUR020EE871600161234567892009ÕIE MÄGER0071234561011Torso Tiger072http://localhost/project/5ec176fcb469c4d1d549e6aa?payment_action=success071http://localhost/project/5ec176fcb469c4d1d549e6aa?payment_action=cancel0242020-05-17T17:40:24+0000"; */
        
        // STEP 4. Sign the data with RSA-SHA1 to generate MAC code
        // ========================================================
        
        openssl_sign ($data, $signature, $private_key, OPENSSL_ALGO_SHA1);
        
        /* a2TakNYPTigMNgQt1QUSbNUozPfvFFxXRVw1vB1s3prFBeWk5oUzsM/WeRjCjvcXGb78kqNbtg4yTur7djEZYdItDLdPV342F6Wu58je1JI5RRY8+BZBhCWLp6wPCK5On6T61zP+kCC7RwnqAGqoFOZ3IBxmwpm7OtvOPeaHx8ShZprqO9KDC3Iw1yeUdaOfcdpKgTYZneV+CR/aV1Lkmo3ANdQ0DqV1qfFuw56UXoul81TLwfqBAqgABOoqTLgPSRegIvLfHp0DKjzXE2CiT90TLNmPTAbCwG57qBpGSgw+LRmeaMjdhYKm4Oc4VpZsSHu4EeYttiYFahwmvUFpzQ== */
        $fields["VK_MAC"] = base64_encode($signature);
        // STEP 5. Generate POST form with payment data that will be sent to the bank
        // ==========================================================================
        return view('pay')->withFields($fields);
    }
}
